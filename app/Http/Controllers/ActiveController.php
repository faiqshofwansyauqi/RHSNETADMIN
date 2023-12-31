<?php

namespace App\Http\Controllers;

use RouterOS\Config;
use RouterOS\Client;
use RouterOS\Query;
use Illuminate\Http\Request;

class ActiveController extends Controller
{
    public function index()
    {
        $activeUsers = $this->getActiveUsers();

        return view('dashboard.active.index', compact('activeUsers'));
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
        $activeuser_count = count($response);

        $query = new Query('/ip/hotspot/active/print');
        $hotspotactive_data = $client->query($query)->read();

        return view('dashboard.active.index', compact('activeuser_count','hotspotactive_data'));
    }
}
