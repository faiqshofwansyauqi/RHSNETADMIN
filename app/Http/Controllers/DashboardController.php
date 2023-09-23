<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \RouterOS\Client;
use \RouterOS\Query;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPrice = DB::table('history')->sum('price');
        return view('dashboard.index', ['totalPrice' => $totalPrice]);
    }

    public function mikrotik()
    {
        $client = new Client([
            'host' => 'sg02.konekter.us:10958',
            'user' => 'Elisoft',
            'pass' => 'Elisoft',
            'port' => 8728,
        ]);
        if ($client == false) {
            return view('Eror');
        }


        
        $query =(new Query('/ip/hotspot/active/print'));
        $response = $client->query($query)->read();
        $active = count($response);    

        $query = (new Query('/ip/hotspot/user/profile/print'));
        $response = $client->query($query)->read();
        $userprofile = count($response);

        $query =(new Query('/ip/hotspot/user/print'));
        $response = $client->query($query)->read();
        $user = count($response);
        return view('dashboard.index', compact('active', 'user','userprofile'));
    }
}
