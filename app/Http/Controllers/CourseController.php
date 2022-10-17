<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $sections = Section::where('status', 1)->orderBy('name', 'asc')->get();
        // $courses = Course::where('status', 1)->get();
        $courses = DB::table('course')
                    ->select('course.*', 'sections.name as sec')
                    ->join('sections', 'sections.id', '=', 'course.section_id')
                    ->where('sections.status', '=', 1)
                    ->where('course.status', '=', 1)
                    ->get();
        return view('courses', compact('sections', 'courses'));
    }

    public function course(Course $course)
    {
        if(auth()->check() && auth()->user()->id)
        {
            $orderStatus = DB::table('orders')
                            ->where('student_id', '=', auth()->user()->id)
                            ->where('course_id', '=', $course->id)
                            ->count();
            return view('course', compact('course', 'orderStatus'));
        }else{
            return view('course', compact('course'));
        }
    }
}
