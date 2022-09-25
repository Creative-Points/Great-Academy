<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function code()
    {
        return Str::random(8);
    }

    public function orderCheck($item, $itemName)
    {
        // $order_id = $order->id;
        $std_id = auth()->user()->id;
        $count = Order::where('student_id', $std_id)->where($itemName, $item)->count();
        if($count == 0)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /*
     * If student is register in db
    */
    public function courseRegisterUser(Course $course)
    {
        if($this->orderCheck($course->id, 'course_id'))
        {
            $code = $this->code();
            Order::create([
                'course_id'     => $course->id,
                'student_id'    => Auth::user()->id,
                'code'          => $code,
            ]);
            return back()->with('success', "تم الاشتراك بنجاح يرجى التواصل معنا بالكود الخاص بطلبك لتفعيل الاشتراك. الكود: $code");
        }else{
            return back()->with('error', 'انت مشترك بالفعل.');
        }
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
            $code = $this->code();
            $std = User::create([
                'name'          => $request->name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'university'    => $request->university,
                'faculty'       => $request->faculty,
                'status'        => 2,
            ])->assignRole('student');
            Order::create([
                'course_id'     =>  $cid,
                'student_id'    =>  $std->id,
                'code'          =>  $code,
            ]);

            return back()->with('success', "تم الاشتراك بنجاح يرجى التواصل معنا بالكود الخاص بطلبك لتفعيل الاشتراك. الكود: $code");
        }
    }

    public function workshopRegisterUser(Workshop $workshop)
    {
        if($this->orderCheck($workshop->id, 'workshop_id'))
        {
            $code = $this->code();
            Order::create([
                'workshop_id'   => $workshop->id,
                'student_id'    => Auth::user()->id,
                'code'          => $code,
            ]);
            return back()->with('success', "تم الاشتراك بنجاح يرجى التواصل معنا بالكود الخاص بطلبك لتفعيل الاشتراك. الكود: $code");
        }else{
            return back()->with('error', 'انت مشترك بالفعل.');
        }
    }

    public function workshopNewUser(Request $request, Workshop $workshop)
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
            $cid = $workshop->id;
            $code = $this->code();
            $std = User::create([
                'name'          => $request->name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'university'    => $request->university,
                'faculty'       => $request->faculty,
                'status'        => 2,
            ])->assignRole('student');
            Order::create([
                'workshop_id'     =>  $cid,
                'student_id'    =>  $std->id,
                'code'          =>  $code,
            ]);

            return back()->with('success', "تم الاشتراك بنجاح يرجى التواصل معنا بالكود الخاص بطلبك لتفعيل الاشتراك. الكود: $code");
        }
    }
}
