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

        $route = 'emp';
        return route($route . '.instructor.manage');
    }
}
