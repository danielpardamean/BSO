<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koreksi;
use App\Pengajuan;
use Carbon\Carbon;
use App\Http\Requests\KoreksiRequest;

class KoreksiController extends Controller
{
    public function create($id)
    {
        $pengajuan = Pengajuan::find($id);
        return view('koreksi.create')->withPengajuan($pengajuan);
    }

    public function store(KoreksiRequest $request)
    {
        $credentials = $request->validated();

        $file = $request->file('dokumen');
        $fileName = Carbon::now()->toDateString() . "." . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/dokumen-koreksi', $fileName);

        Koreksi::create([
            'information' => $credentials['information'],
            'document' => $path,
            'nip' => auth('pegawai')->user()->nip,
            'pengajuan_id' => $credentials['pengajuan_id']
        ]);

        return redirect()->route('pengajuan.show', $credentials['pengajuan_id']);
    }

    public function destroy(Koreksi $koreksi)
    {
        $koreksi->delete();

        return redirect()->back();
    }
}
