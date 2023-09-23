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
        $user = User::findOrFail($id);
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'confirmed|max:8|different:password',
        ]);
        
        if (Hash::check($request->password, $user->password)) { 
           $user->fill([
               'password' => Hash::make($request->new_password),

               ])->save();
        
           $request->session()->flash('success', 'Password changed');
            return redirect()->route('your.route');
        
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->to('your.route');
        }
    }
}
