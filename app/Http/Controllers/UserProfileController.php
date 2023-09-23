<?php

namespace App\Http\Controllers;

use RouterOS\Config;
use RouterOS\Client;
use RouterOS\Query;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function index()
    {
        $UsersProfile = $this->getProfile();

        return view('dashboard.userprofile.index', compact('UsersProfile'));
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

        $query = (new Query('/ip/hotspot/user/profile/print'));
        $response = $client->query($query)->read();
        $userprofile_count = count($response);

        $query = new Query('/ip/hotspot/user/profile/print');
        $userprofile_data = $client->query($query)->read();

        return view('dashboard.userprofile.index', compact('userprofile_count','userprofile_data'));
    }

    // public function create()
    // {

    //     $client = new Client([
    //         'host' => 'sg02.konekter.us:10958',
    //         'user' => 'Elisoft',
    //         'pass' => 'Elisoft'
    //     ]);
    //     $profile = $client->query('/ip/hotspot/user/profile/print')->read();

    //     return view('dashboard.userprofile.create', compact('profile'));
    // }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $users = Profile::create([
    //         'namaprofile'     => $request->namaprofile,
    //         'kodemikhon'   => $request->kodemikhon,
    //         'speed'   => 0,
    //         'kuota'   => 0,
    //         'durasi'   => $request->durasi,
    //         'satuandurasi'   => $request->satuandurasi,
    //         'harga'   => $request->harga,
    //         'jumlah'   => 0,
    //     ]);


    //     return redirect(route('user.index'));
    // }

    // public function edit($id)
    // {
    //     $users = Profile::find($id); // Gantilah 'User' dengan model pengguna yang sesuai

    //     return view('dashboard.userprofile.edit', compact('users'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $user = Profile::find($id);
    //     if (!$user) {
    //         return redirect()->route('user.index')->with('error', 'Profil pengguna tidak ditemukan.');
    //     }
    //     $user->update([
    //         'namaprofile'     => $request->namaprofile,
    //         'kodemikhon'   => $request->kodemikhon,
    //         'speed'   => $request->speed,
    //         'kuota'   => $request->kuota,
    //         'durasi'   => $request->durasi,
    //         'satuandurasi'   => $request->satuandurasi,
    //         'harga'   => $request->harga,
    //         'jumlah'   => $request->jumlah,
    //     ]);
    //     return redirect()->route('user.index')->with('success', 'Profil pengguna berhasil diperbarui.');
    // }
    // public function destroy($id)
    // {
    //     $users = Profile::find($id);
    //     $users->delete();

    //     return redirect(route('user.index'));
    // }
}
