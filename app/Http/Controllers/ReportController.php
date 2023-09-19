<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function index()
{
    $orders = Order::all();
    return view('dashboard.report.index', compact('orders'));
}

    public function getData()
    {
        $orders = Order::select('*');
        return DataTables::of($orders)->make(true);
    }
}
