<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::whereHas("roles", function ($q){
            $q->where('name', 'student');
        })->get();
        return view('admin.student.index', compact('users'));
    }

    public function store(Request $request, User $user)
    {
        // return back();
        $validation = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email|unique:users,email',
            'phone'         => 'required|numeric|unique:users,phone',
            'address'       => 'required|string',
            'university'    => 'required|string',
            'faculty'       => 'required|string',
            'password'      => 'required|string|min:8|max:18'
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        } else {
            $user->create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'university'    => $request->university,
                'faculty'       => $request->faculty,
                'code'          => 'std-'.Str::random(16).'@great-academy.com',
                'password'      => Hash::make($request->password),
            ])->assignRole('student');

            return back()->with('success', 'Student has been added successfully.');
        }
    }

    public function update(Request $request, $user)
    {
        // return back();
        $validation = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email|unique:users,email,'.$user,
            'phone'         => 'required|numeric|unique:users,phone,'.$user,
            'address'       => 'required|string',
            'university'    => 'required|string',
            'faculty'       => 'required|string',
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        } else {
            $u = User::find($user);
            $u->name        = $request->name;
            $u->email       = $request->email;
            $u->phone       = $request->phone;
            $u->address     = $request->address;
            if(empty($u->code)){
                $u->code    = 'std-'.Str::random(16).'@great-academy.com';
            }
            $u->university  = $request->university;
            $u->faculty     = $request->faculty;
            $u->status      = $request->status;
            $u->update();

            return back()->with('success', 'Student has been Updated successfully.');
        }
    }

    public function show( $user)
    {
        $users = User::find($user);
        return view('admin.student.view', compact('users'));
    }
}
