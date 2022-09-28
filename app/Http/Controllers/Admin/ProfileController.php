<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function account()
    {
        return view('admin.profile.account');
    }


    public function update(Request $request)
    {
        $user = auth()->user()->id;
        $valid = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email|unique:users,email,'.$user,
            'phone'         => 'required|numeric|unique:users,phone,'.$user,
            'address'       => 'required|string',
            'university'    => 'nullable|string',
            'faculty'       => 'nullable|string',
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $user = User::find($user);
            $user->name         =  $request->name;
            $user->email        =  $request->email;
            $user->phone        =   $request->phone;
            $user->address      =   $request->address;
            $user->university   =   $request->university;
            $user->faculty      =   $request->faculty;
            $user->update();
            return back()->with('success', 'Your profile data is updated.');
        }
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user()->id;
        $valid = Validator::make($request->all(),[
            'password'  => 'required|string|min:8|max:18|same:confirmPassword'
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $user = User::find($user);
            $user->password = Hash::make($request->password);
            $user->update();
            
            return back()->with('success', 'The password is Changed.');
        }
    }
}
