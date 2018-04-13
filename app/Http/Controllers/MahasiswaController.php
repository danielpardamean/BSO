<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\ProgramStudi;
use Illuminate\Http\Request;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);
        return view('mahasiswa.index')->withMahasiswas($mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programStudi =ProgramStudi::all();
        return view('mahasiswa.create')->withProgramStudis($programStudi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        $credentials = $request->validated();

        $path = $request->file('profile_picture')->store('profile-pictures');

        Mahasiswa::create([
            "nim" => $credentials['nim'],
            "name" => $credentials['name'],
            "password" => bcrypt($credentials['password']),
            "program_studi_id" => $credentials['programStudi'],
            "profile_picture" => $path,
        ]);

        return redirect()->route('mahasiswa.index');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        $programStudi =ProgramStudi::all();
        return view('mahasiswa.edit')->withMahasiswa($mahasiswa)->withProgramStudis($programStudi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $credentials = $request->validated();

        $mahasiswa->nim = $credentials['nim'];
        $mahasiswa->name = $credentials['name'];
        $mahasiswa->program_studi_id = $credentials['programStudi'];

        $mahasiswa->save();
        
        return redirect()->route('mahasiswa.edit', $mahasiswa->nim);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }
}
