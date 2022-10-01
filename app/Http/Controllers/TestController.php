<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Test;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index()
    {
        // $string = "المهارات الشخصية";
        // return Str::slug($string, "-");
        // $data = "ana";
        // $id = DB::table('test')->insertGetId([
        //     'data' => $data,
        // ]);
        // return $id;
        // return Str::random(8);
        // $user = Test::create([
        //     'data'      =>  'abc'
        // ]);

        // return $user->id;
        // return response()->file("uploads/material/file.pdf", [
        //     'Content-Type' => 'application/pdf'
        // ]);
        // return Storage::mimeType('uploads/material/file.pdf');
        // return Storage::putFileAs('uploads/material', 'uploads/material/file.pdf', 'nabil.pdf');
        return view('admin.test');
    }

    public function data()
    {
        // $data = [18, 7, 15, 29, 18, 12, 9, 17, 9,0];
        // $data = array(
        //     [
        //         'x'         =>  1996,
        //         'y'         =>  192,
        //     ],
        //     [
        //         'x'         =>  1997,
        //         'y'         =>  12,
        //     ],
        //     [
        //         'x'         =>  1998,
        //         'y'         =>  90,
        //     ],
        //     [
        //         'x'         =>  1999,
        //         'y'         =>  90,
        //     ],
        //     [
        //         'x'         =>  2000,
        //         'y'         =>  90,
        //     ],
        // );
        $y21 = [18, 7, 15, 29, 18, 12, 9, 17, 9,10];
        $data = array(
            [
                'name'  => 2021,
                'data'  => $y21,
            ],
            [
                'name'  => 2020,
                'data'  => [-13, -18, -9, -14, -5, -17, -15, -10, -23, -3]
            ]

        );
        return response()->json($data, 200);
    }
}
