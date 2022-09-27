<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::whereHas("roles", function ($q) {
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

        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $user->create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'university'    => $request->university,
                'faculty'       => $request->faculty,
                'code'          => 'std-' . Str::random(16) . '@great-academy.com',
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
            'email'         => 'required|email|unique:users,email,' . $user,
            'phone'         => 'required|numeric|unique:users,phone,' . $user,
            'address'       => 'required|string',
            'university'    => 'required|string',
            'faculty'       => 'required|string',
        ]);

        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $u = User::find($user);
            $u->name        = $request->name;
            $u->email       = $request->email;
            $u->phone       = $request->phone;
            $u->address     = $request->address;
            if (empty($u->code)) {
                $u->code    = 'std-' . Str::random(16) . '@great-academy.com';
            }
            $u->university  = $request->university;
            $u->faculty     = $request->faculty;
            $u->status      = $request->status;
            $u->update();

            return back()->with('success', 'Student has been Updated successfully.');
        }
    }

    public function show($user)
    {
        $users = User::find($user);
        $courses = DB::table('orders')
                    ->where('orders.student_id', '=', $user)
                    ->select('orders.*', 'orders.code as ocode', 'course.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('course', 'course.id', '=', 'orders.course_id')
                    ->join('sections', 'sections.id', '=', 'course.section_id')
                    // ->groupBy('orders.student_id')
                    ->get();
        $workshops = DB::table('orders')
                    ->where('orders.student_id', '=', $user)
                    ->select('orders.*', 'orders.code as ocode', 'workshop.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('workshop', 'workshop.id', '=', 'orders.workshop_id')
                    ->join('sections', 'sections.id', '=', 'workshop.section_id')
                    // ->groupBy('orders.student_id')
                    ->get();
        $c_courses = count($courses);
        $c_workshops = count($workshops);
        return view('admin.student.view', compact('users', 'courses', 'workshops', 'c_courses', 'c_workshops'));
    }

    public function suspended($user)
    {
        $user = User::find($user);
        $user->status = 3;
        $user->update();

        return back()->with('success', 'Student account has been Suspened is successfully.');
    }

    public function active($user)
    {
        $user = User::find($user);
        $user->status = 1;
        $user->update();

        return back()->with('success', 'Student account has been Activated is successfully.');
    }

    public function changePassword(Request $request, $user)
    {
        $validation = Validator::make($request->all(), [
            'password'  => 'required|string|min:8|max:18|same:confirmPassword'
        ]);
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $user = User::find($user);
            $user->password = Hash::make($request->password);
            $user->update();

            return back()->with('success', 'The password is Changed.');
        }
    }

    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'Student account has been deleted.');
    }
}
