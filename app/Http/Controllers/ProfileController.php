<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.page.profile.ubahProfile');
    }
    public function update_profile()
    {
        $user = Auth::user();
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'password_lama' => 'required',
            'password_baru' => 'confirmed|max:8|different:password',
        ]);
        
        if (Hash::check($request->password_lama, $user->password)) { 
           $user->fill([
               'password' => Hash::make($request->password_baru),
               ])->save();
        
           $request->session()->flash('success', 'Data berhasil diubah');
            return redirect()->route('admin.page.profile.ubahProfile');
        
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->to('your.route');
        }
    }
}
