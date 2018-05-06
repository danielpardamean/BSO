<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramStudi;

class ProgramStudiController extends Controller
{
    public function index()
    {
        return view('prodi.index')->withProgramStudis(ProgramStudi::paginate(10));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        ProgramStudi::create([
            'name' => $request->get('name')
        ]);
        return redirect()->route('prodi.index');
    }

    public function edit(ProgramStudi $prodi)
    {
        return view('prodi.edit')->withProgramStudi($prodi);
    }

    public function update(Request $request, ProgramStudi $prodi)
    {
        $prodi->name = $request->get('name');
        $prodi->save();

        return redirect()->back();
    }

    public function destroy(ProgramStudi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index');
    }
}
