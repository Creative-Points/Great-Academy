<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function settings()
    {
        return view('student.settings');
    }

    public function password()
    {
        return view('student.password');
    }

    public function myCourses()
    {
        $id = auth()->user()->id;
        // $courses = DB::table('orders')
        //                 ->select('orders.*', 'course.*')
        //                 ->where('orders.')
        $courses = DB::table('orders')
                    ->where('orders.student_id', '=', $id)
                    ->select('orders.*', 'orders.code as ocode', 'course.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('course', 'course.id', '=', 'orders.course_id')
                    ->join('sections', 'sections.id', '=', 'course.section_id')
                    ->paginate();
        return view('student.courses', compact('courses'));
    }

    public function myWorkshops()
    {
        $id = auth()->user()->id;
        // $courses = DB::table('orders')
        //                 ->select('orders.*', 'course.*')
        //                 ->where('orders.')
        $workshops = DB::table('orders')
                    ->where('orders.student_id', '=', $id)
                    ->select('orders.*', 'orders.code as ocode', 'workshop.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('workshop', 'workshop.id', '=', 'orders.workshop_id')
                    ->join('sections', 'sections.id', '=', 'workshop.section_id')
                    ->paginate();
        return view('student.workshops', compact('workshops'));
    }

}
