<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
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
        return Str::random(8);
    }
}
