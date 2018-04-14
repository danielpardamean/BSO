<?php

namespace App\Http\Controllers;

use App\Type;
use App\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    public function __construct ()
    {
        $this->middleware('loggedIn');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(10);
        return view('pegawai.index')->withPegawais($pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type =Type::all();
        return view('pegawai.create')->withTypes($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        $credentials = $request->validated();

        $path = $request->file('profile_picture')->store('public/profile-pictures');

        Pegawai::create([
            "nip" => $credentials['nip'],
            "name" => $credentials['name'],
            "password" => bcrypt($credentials['password']),
            "id_type" => $credentials['type'],
            "profile_picture" => $path,
        ]);

        return redirect()->route('pegawai.index');
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
    public function edit(Pegawai $pegawai)
    {
        $type =Type::all();
        return view('pegawai.edit')->withPegawai($pegawai)->withTypes($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, Pegawai $pegawai)
    {
        $credentials = $request->validated();

        $pegawai->nip = $credentials['nip'];
        $pegawai->name = $credentials['name'];
        $pegawai->id_type = $credentials['type'];

        $pegawai->save();
        
        return redirect()->route('pegawai.edit', $pegawai->nip);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index');
    }
}
