<?php

namespace App\Http\Controllers;

use App\Models\History;
use Yajra\DataTables\Facades\DataTables;

class OmsetController extends Controller
{
    public function index()
{
    $history = History::all();
    return view('dashboard.omset.index', compact('history'));
}

    public function getData()
    {
        $history = History::select('*');
        return DataTables::of($history)->make(true);
    }
}
