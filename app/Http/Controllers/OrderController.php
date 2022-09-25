<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /*
     * If student is register in db
    */
    public function courseRegisterUser(Request $request, Course $course)
    {
        // 
    }

    /* 
     * If student is not registerd
    */
    public function courseNewUser(Request $request, Course $course)
    {
        $valid = Validator::make($request->all(), [
            'name'      =>  'required|string|min:6',
            'phone'     =>  'required|numeric|digits:11|unique:users,phone',
            'email'     =>  'required|email|unique:users,email',
            'university'=>  'required|string',
            'faculty'   =>  'required|string',
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $cid = $course->id;
            $std = User::create([
                'name'          => $request->name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'university'    => $request->university,
                'faculty'       => $request->faculty,
                'status'        => 2,
            ])->assignRole('student');
            $code = Str::random(8);
            Order::create([
                'course_id'     =>  $cid,
                'student_id'    =>  $std->id,
                'code'          =>  $code,
            ]);

            return back()->with('success', "تم الاشتراك بنجاح يرجى التواصل معنا بالكود الخاص بطلبك لتفعيل الاشتراك. الكود: $code");
        }
    }
}
