<?php

namespace App\Http\Middleware;

use Closure;

class OtorisasiBimbingan
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
        $idBimbingan = $request->segments()[1];

        if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'admin'){
            return $next($request);
        }

        if(auth('pegawai')->check()){
            $mahasiswaYangDibimbing = auth('pegawai')->user()->membimbing->pluck('nim')->toArray();
            $bimbingan = \App\Bimbingan::whereIn('nim', $mahasiswaYangDibimbing)->where('id', $idBimbingan)->get();
            if($bimbingan->count() > 0){
                return $next($request);
            }
        }
        
        if(auth('mahasiswa')->check()){
            if(auth('mahasiswa')->user()->bimbingan->id == $idBimbingan){
                return $next($request);
            }
        }

        return redirect()->route('bimbingan.index');
    }
}
