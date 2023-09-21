<?php

namespace App\Http\Controllers;

use RouterOS\Config;
use RouterOS\Client;
use RouterOS\Query;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Users = $this->getUsers();

        return view('dashboard.active.index', compact('Users'));
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

        $query = (new Query('/ip/hotspot/user/print'));
        $response = $client->query($query)->read();
        $users_count = count($response);

        $query = new Query('/ip/hotspot/user/print');
        $usersdata = $client->query($query)->read();

        return view('dashboard.user.index', compact('usersdata', 'users_count'));
    }
    public function delete($id)
    {
        // Lakukan proses penghapusan data berdasarkan $id

        // Redirect kembali ke halaman sebelumnya atau ke halaman lain
        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
