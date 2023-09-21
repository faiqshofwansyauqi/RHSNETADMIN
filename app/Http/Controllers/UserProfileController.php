<?php

namespace App\Http\Controllers;

use \RouterOS\Client;
use \RouterOS\Query;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function index()
{
    $users = Profile::orderBy('id', 'ASC')->get();
    return view('dashboard.userprofile.index', compact('users'));
}

    public function create()
    {

        $client = new Client([
            'host' => 'sg02.konekter.us:10958',
            'user' => 'Elisoft',
            'pass' => 'Elisoft'
        ]);
        $profile = $client->query('/ip/hotspot/user/profile/print')->read();

        return view('dashboard.userprofile.create', compact('profile'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $users = Profile::create([
            'namaprofile'     => $request->namaprofile,
            'kodemikhon'   => $request->kodemikhon,
            'speed'   => 0,
            'kuota'   => 0,
            'durasi'   => $request->durasi,
            'satuandurasi'   => $request->satuandurasi,
            'harga'   => $request->harga,
            'jumlah'   => 0,
        ]);


        return redirect(route('user.index'));
    }

    public function edit($id)
    {
        $users = Profile::find($id); // Gantilah 'User' dengan model pengguna yang sesuai

        return view('dashboard.userprofile.edit', compact('users'));
    }

    public function update(Request $request, $id)
{   
    $user = Profile::find($id);
    if (!$user) {
        return redirect()->route('user.index')->with('error', 'Profil pengguna tidak ditemukan.');
    }
    $user->update([
        'namaprofile'     => $request->namaprofile,
        'kodemikhon'   => $request->kodemikhon,
        'speed'   => $request->speed,
        'kuota'   => $request->kuota,
        'durasi'   => $request->durasi,
        'satuandurasi'   => $request->satuandurasi,
        'harga'   => $request->harga,
        'jumlah'   => $request->jumlah,
    ]);
    return redirect()->route('user.index')->with('success', 'Profil pengguna berhasil diperbarui.');
}
    public function destroy($id)
    {
        $users = Profile::find($id);
        $users->delete();

        return redirect(route('user.index'));
    }
}
