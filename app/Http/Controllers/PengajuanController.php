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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('pengajuan.create')->withBimbingan($bimbingan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengajuanRequest $request)
    {
        $credentials = $request->validated();

        $file = $request->file('dokumen');
        $fileName = Carbon::now()->toDateString() . "." . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/dokumen-pengajuan', $fileName);

        Pengajuan::create([
            'title' => $credentials['title'],
            'document' => $path,
            'bimbingan_id' => $credentials['id_bimbingan']
        ]);

        return redirect()->route('bimbingan.show', $credentials['id_bimbingan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        // dd($pengajuan);
        return view('pengajuan.show')->withPengajuan($pengajuan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
