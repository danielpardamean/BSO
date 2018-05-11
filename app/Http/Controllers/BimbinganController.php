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
    public function __construct ()
    {
        $this->middleware('admin');
        $this->middleware('otorisasiBimbingan')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'dosen'){
            $pegawai = auth('pegawai')->user();
            $mahasiswaBimbingan = $pegawai->membimbing->pluck('nim')->toArray();
            $bimbingan = Bimbingan::whereIn('nim', $mahasiswaBimbingan)->paginate(10);
        }else if(auth('pegawai')->check() AND auth('pegawai')->user()->tipe->name == 'admin'){
            $bimbingan = Bimbingan::paginate(10);
        }else{
            $bimbingan = Bimbingan::where('nim', auth('mahasiswa')->user()->nim)->paginate(10);
        }
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

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = $credentials['nim'] . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/dokumen-bimbingan', $fileName);
        }else{
            $path = '';
        }
        $bimbingan = Bimbingan::create([
            "nim" => $credentials["nim"],
            "title" => $credentials["title"],
            "tanggal_mulai_bimbingan" => $credentials['tanggal_mulai_bimbingan'],
            "document" => $path,
        ]);

        $mahasiswa = Mahasiswa::find($credentials['nim']);
        $mahasiswa->pembimbing()->attach($credentials['pembimbing']);

        return redirect()->route('bimbingan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bimbingan $bimbingan)
    {
        return view('bimbingan.show')->withBimbingan($bimbingan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bimbingan $bimbingan)
    {
        $type = Type::where('name', 'dosen')->first();
        $dosen = Pegawai::where('id_type', $type->id)->get();
        $mahasiswa = Mahasiswa::all();

        return view('bimbingan.edit')->withDosens($dosen)->withMahasiswas($mahasiswa)->withBimbingan($bimbingan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BimbinganRequest $request, Bimbingan $bimbingan)
    {
        if ($request->hasFile('dokumen')) {
            $file = $request->dokumen;
            $fileName = $bimbingan->nim . "." . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/dokumen-bimbingan', $fileName);

            $bimbingan->document = $path;
        }
        
        $request = $request->validated();
        $bimbingan->title = $request['title'];
        $bimbingan->tanggal_mulai_bimbingan = $request['tanggal_mulai_bimbingan'];
        $bimbingan->save();

        $mahasiswa = Mahasiswa::find($bimbingan->nim);
        $mahasiswa->pembimbing()->sync($request['pembimbing']);

        return redirect()->route('bimbingan.edit', $bimbingan->id);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bimbingan $bimbingan)
    {
        $mahasiswa = Mahasiswa::find($bimbingan->nim);
        $mahasiswa->pembimbing()->detach();

        $bimbingan->delete();

        return redirect()->route('bimbingan.index');    
    }

    public function download ($url)
    {
        $path = storage_path("app/public/dokumen-bimbingan/$url");

        return response()->download($path);
    }
}
