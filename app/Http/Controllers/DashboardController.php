<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('dashboard.index');
    }

    public function mikrotik()
    {
        $client = new Client([
            'host' => 'sg02.konekter.us:11081',
            'user' => 'Elisoft',
            'pass' => 'Elisoft',
            'port' => 8728,
        ]);
        if ($client == false) {
            return view('Eror');
        }


        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/active/print'));

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        $active = count($response);
        // dd($response);

        $query =
            (new Query('/ip/hotspot/user/print'));

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        $user = count($response);
        return view('dashboard.index',compact('active', 'user'));
    }
}
