<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::role(['admin', 'employee'])->paginate();
        return view('admin.employee.index', compact('users'));
    }

    public function store(Request $request, User $user)
    {
        // return back();
        $validation = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email|unique:users,email',
            'phone'         => 'required|numeric|unique:users,phone',
            'address'       => 'required|string',
            'university'    => 'nullable|string',
            'faculty'       => 'nullable|string',
            'password'      => 'required|string|min:8|max:18'
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        } else {
            
            if(!empty($request->role) && is_string($request->role))
            {
                
                if($request->role == 'admin')
                {
                    $user->create([
                        'name'          => $request->name,
                        'email'         => $request->email,
                        'phone'         => $request->phone,
                        'address'       => $request->address,
                        'university'    => $request->university,
                        'faculty'       => $request->faculty,
                        // 'code'          => 'std-'.Str::random(16).'@great-academy.com',
                        'password'      => Hash::make($request->password),
                    ])->assignRole('Admin');
                }
                elseif($request->role == 'employee')
                {
                    $user->create([
                        'name'          => $request->name,
                        'email'         => $request->email,
                        'phone'         => $request->phone,
                        'address'       => $request->address,
                        'university'    => $request->university,
                        'faculty'       => $request->faculty,
                        // 'code'          => 'std-'.Str::random(16).'@great-academy.com',
                        'password'      => Hash::make($request->password),
                    ])->assignRole('Employee');
                }
                else
                {
                    return back()->with('error', 'Please select right role');
                }
                return back()->with('success', 'Employee account has been added successfully.');
            }
            else
            {
                return back()->with('error', 'Please select right role');
            }
        }
    }

    public function update(Request $request,$id)
    {
        // return back();
        $validation = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email|unique:users,email,'.$id,
            'phone'         => 'required|numeric|unique:users,phone,'.$id,
            'address'       => 'required|string',
            'university'    => 'nullable|string',
            'faculty'       => 'nullable|string',
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        } else {
            $user = User::find($id);
            $user->name        = $request->name;
            $user->email       = $request->email;
            $user->phone       = $request->phone;
            $user->address     = $request->address;
            // if(empty($u->code)){
            //     $u->code    = 'std-'.Str::random(16).'@great-academy.com';
            // }
            $user->university  = $request->university;
            $user->faculty     = $request->faculty;
            $user->status      = $request->status;
            $user->update();

            return back()->with('success', 'Employee account has been Updated successfully.');
        }
    }

    public function show(User $user)
    {
        $users = $user;
        return view('admin.employee.view', compact('users'));
    }

    public function suspended(User $user)
    {
        if($user->id == auth()->user()->id)
        {
            return back()->with('error', 'You can not Suspeded your self.');
        }else{
            $user->status = 3;
            $user->update();
            return back()->with('success', 'Employee account has been Suspened is Successfully.');
        }
    }

    public function active(User $user)
    {
        $user->status = 1;
        $user->update();

        return back()->with('success', 'Employee account has been Activated is Successfully.');
    }

    public function changePassword(Request $request,User $user)
    {
        $validation = Validator::make($request->all(),[
            'password'  => 'required|string|min:8|max:18|same:confirmPassword'
        ]);
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }else{
            $user->password = Hash::make($request->password);
            $user->update();
            
            return back()->with('success', 'The password is Changed.');
        }
    }

    public function delete(User $user)
    {
        if($user->id == auth()->user()->id){
            return back()->with('error', 'You can not delete this account');
        }
        $user->delete();
        return back()->with('success', 'Student account has been deleted.');
    }
}
