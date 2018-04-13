<?php

namespace App\Http\Controllers;

use App\Type;
use App\Pegawai;
use App\Bimbingan;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\BimbinganRequest;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan = Bimbingan::paginate(10);
        return view('bimbingan.index')->withBimbingans($bimbingan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::where('name', 'dosen')->first();
        $dosen = Pegawai::where('id_type', $type->id)->get();
        $mahasiswa = Mahasiswa::all();

        return view('bimbingan.create')->withDosens($dosen)->withMahasiswas($mahasiswa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BimbinganRequest $request)
    {
        $credentials = $request->validated();

        $file = $request->file('dokumen');
        $fileName = $credentials['nim'] . "." . $file->getClientOriginalExtension();

        $path = $file->storeAs('dokumen-bimbingan', $fileName);

        $bimbingan = Bimbingan::create([
            "nim" => $credentials["nim"],
            "title" => $credentials["title"],
            "document" => $path,
        ]);

        $mahasiswa = Mahasiswa::find($credentials['nim']);
        dd($mahasiswa->pembimbing()->attach($credentials['pembimbing']));

        return redirect()->route('bimbingan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Bimbingan $bimbingan)
    {
        $bimbingan->delete();

        return redirect()->route('bimbingan.index');    
    }
}
