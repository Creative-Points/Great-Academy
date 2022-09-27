<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // ===================================================
    // workshop
    // ===================================================
    public function wIndex()
    {
        $orders = DB::table('orders')->where('workshop_id', '!=', 'NULL')
                        ->select('orders.*', 'orders.id as oid', 'orders.code as ocode', 'orders.status as ostatus', 'users.*', 'users.id as uid', 'users.name AS username', 'workshop.*')
                        ->join('users', 'orders.student_id', '=', 'users.id')
                        ->join('workshop', 'orders.workshop_id', '=', 'workshop.id')
                        ->get();
        return view('admin.order.workshop.index', compact('orders'));
    }

    public function wShow(Order $order)
    {
        $order_id = $order->id;
        $order = DB::table('orders')
                    ->where('orders.id', '=', $order_id)
                    ->select('orders.*', 'orders.id as oid', 'orders.code as ocode', 'orders.status as ostatus', 'users.*', 'users.id as uid', 'users.name AS username', 'users.status as ustatus', 'workshop.*')
                    ->join('users', 'users.id', '=', 'orders.student_id')
                    ->join('workshop', 'workshop.id', '=', 'orders.workshop_id')
                    ->first();
        return view('admin.order.workshop.view', compact('order'));
    }

    // ===================================================
    // course
    // ===================================================
    public function cIndex()
    {
        $orders = DB::table('orders')->where('course_id', '!=', 'NULL')
                        ->select('orders.*', 'orders.id as oid', 'orders.code as ocode', 'orders.status as ostatus', 'users.*', 'users.id as uid', 'users.name AS username', 'course.*')
                        ->join('users', 'orders.student_id', '=', 'users.id')
                        ->join('course', 'orders.course_id', '=', 'course.id')
                        ->get();
        return view('admin.order.course.index', compact('orders'));
    }

    public function cShow(Order $order)
    {
        $order_id = $order->id;
        $order = DB::table('orders')
                    ->where('orders.id', '=', $order_id)
                    ->select('orders.*', 'orders.id as oid', 'orders.code as ocode', 'orders.status as ostatus', 'users.*', 'users.id as uid', 'users.name AS username', 'users.status as ustatus', 'course.*')
                    ->join('users', 'users.id', '=', 'orders.student_id')
                    ->join('course', 'course.id', '=', 'orders.course_id')
                    ->first();
        return view('admin.order.course.view', compact('order'));
    }

    // ===================================================
    // General FUNCS
    // ===================================================

    public function pay(Request $request, Order $order)
    {
        $valid = Validator::make($request->all(), [
            'amount'    => 'required|numeric',
            'rem'       => 'required|numeric'
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $order->amount_paid += $request->amount;
            if(($request->rem - $request->amount) == 0)
            {
                $order->is_paid = 1;
            }
            $order->update();
            return back()->with('success', 'Paid '.$request->amount.' Successfully.');
        }
    }

    public function active(Order $order)
    {
        $order->status = 1;
        $order->update();
        return back()->with('success', 'Order Activated.');
    }

    public function inactive(Order $order)
    {
        $order->status = 2;
        $order->update();
        return back()->with('success', 'Order Inactivated.');
    }
    
    public function suspened(Order $order)
    {
        $order->status = 3;
        $order->update();
        return back()->with('success', 'Order Suspended.');
    }
    
    public function delete(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order Deleted.');
    }
}
