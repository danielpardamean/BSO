<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if(auth('mahasiswa')->check()){
            $user = auth('mahasiswa')->user();
        }else{
            $user = auth('pegawai')->user();
        }
        return view('profile.index')->withUser($user);
    }

    public function password()
    {
        return view('profile.password');
    }

    public function storePassword(Request $request)
    {
        if(auth('mahasiswa')->check()){
            $user = auth('mahasiswa')->user();
        }else{
            $user = auth('pegawai')->user();
        }

        if(Hash::check($request->get('old_password'), $user->password)){
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function profilePicture ()
    {
        return view('profile.profile-picture');
    }

    public function storeProfilePicture (Request $request)
    {
        if ($request->hasFile('profile')) {
            $file = $request->profile;
            if(auth('mahasiswa')->check()){
                $user = auth('mahasiswa')->user();
                $fileName = $user->nim . "." . $file->getClientOriginalExtension();
            }else{
                $user = auth('pegawai')->user();
                $fileName = $user->nip . "." . $file->getClientOriginalExtension();
            }

            $path = $file->storeAs('public/profile-pictures', $fileName);

            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->back();
    }
}
