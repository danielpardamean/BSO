<?php

namespace App\Http\Middleware;

use Closure;
use App\Bimbingan;
use App\Pengajuan;

class OtorisasiPengajuan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $idPengajuan = $request->segments()[1];
        $pengajuan = Pengajuan::find($idPengajuan);

        if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'admin'){
            return $next($request);
        }

        if(auth('pegawai')->check()){
            $mahasiswaYangDibimbing = auth('pegawai')->user()->membimbing->pluck('nim')->toArray();
            $bimbingan = Bimbingan::whereIn('nim', $mahasiswaYangDibimbing)->get();
            
            if(in_array($pengajuan->bimbingan->id, $bimbingan->pluck('id')->toArray())) {
                return $next($request);
            }
        }
        
        if(auth('mahasiswa')->check()){
            if(auth('mahasiswa')->user()->bimbingan->id == $pengajuan->bimbingan->id){
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
