<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koreksi;
use App\Pengajuan;
use Carbon\Carbon;
use App\Http\Requests\KoreksiRequest;

class KoreksiController extends Controller
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
        $pengajuan = Pengajuan::find($id);
        return view('koreksi.create')->withPengajuan($pengajuan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KoreksiRequest $request)
    {
        $credentials = $request->validated();

        $file = $request->file('dokumen');
        $fileName = Carbon::now()->toDateString() . "." . $file->getClientOriginalExtension();

        $path = $file->storeAs('dokumen-koreksi', $fileName);

        Koreksi::create([
            'information' => $credentials['information'],
            'document' => $path,
            'nip' => auth('pegawai')->user()->nip,
            'pengajuan_id' => $credentials['pengajuan_id']
        ]);

        return redirect()->route('pengajuan.show', $credentials['pengajuan_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $koreksi = Koreksi::find($id);
        dd($koreksi);
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
    public function destroy($id)
    {
        //
    }
}
