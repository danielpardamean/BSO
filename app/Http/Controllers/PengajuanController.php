<?php

namespace App\Http\Controllers;

use App\Bimbingan;
use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Requests\PengajuanRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function __construct ()
    {
        $this->middleware('otorisasiPengajuan')->only('show');
    }

    public function create($id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('pengajuan.create')->withBimbingan($bimbingan);
    }

    public function store(PengajuanRequest $request)
    {
        $credentials = $request->validated();

        $file = $request->file('dokumen');
        $fileName = Carbon::now()->toDateString() . "." . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/dokumen-pengajuan', $fileName);

        Pengajuan::create([
            'title' => $credentials['title'],
            'document' => $path,
            'bimbingan_id' => $credentials['id_bimbingan'],
            'nip' => $credentials['nip']
        ]);

        return redirect()->route('bimbingan.show', $credentials['id_bimbingan']);
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('pengajuan.show')->withPengajuan($pengajuan);
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();

        return redirect()->back();
    }

    public function download ($url)
    {
        $path = storage_path("app/public/dokumen-pengajuan/$url");

        return response()->download($path);
    }
}
