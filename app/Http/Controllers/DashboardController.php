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
    public function index(Request $request)
    {
        // Mendapatkan tanggal dari input filter jika ada
        $filterDate = $request->input('filter_date');

        // Mengambil data dari tabel 'history'
        $query = DB::table('history');

        // Jika ada tanggal yang dipilih dalam filter, tambahkan kondisi whereDate
        if (!empty($filterDate)) {
            $query->whereDate('created_at', $filterDate);
        }

        // Menghitung total harga dari entri yang sesuai dengan filter
        $totalPrice = $query->sum('price');

        // Menghitung total pendapatan harian jika tidak ada filter
        $dailyIncome = $query->sum('price');

        // Menghitung total pendapatan bulanan jika tidak ada filter
        $monthlyIncome = $query->whereMonth('created_at', now()->month)->sum('price');

        // Mengirimkan data ke tampilan 'dashboard.index'
        return view('dashboard.index', [
            'totalPrice' => $totalPrice,
            'dailyIncome' => $dailyIncome,
            'monthlyIncome' => $monthlyIncome,
            'filterDate' => $filterDate, // Mengirimkan tanggal filter ke tampilan
        ]);
    }

    public function filterData(Request $request)
{
    $selectedDate = $request->input('filter_date');

    // Filter data berdasarkan tanggal yang dipilih oleh pengguna
    $dailyIncome = DB::table('history')
        ->whereDate('created_at', $selectedDate)
        ->sum('price');

    // Filter data untuk pendapatan bulanan
    $monthlyIncome = DB::table('history')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('price');

    // Format angka ke dalam format mata uang (misalnya: Rp 1,000,000.00)
    $dailyIncomeFormatted = number_format($dailyIncome, 2, ',', '.');
    $monthlyIncomeFormatted = number_format($monthlyIncome, 2, ',', '.');

    return response()->json([
        'dailyIncomeFormatted' => $dailyIncomeFormatted,
        'monthlyIncomeFormatted' => $monthlyIncomeFormatted,
    ]);
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



        $query = (new Query('/ip/hotspot/active/print'));
        $response = $client->query($query)->read();
        $active = count($response);

        $query = (new Query('/ip/hotspot/user/profile/print'));
        $response = $client->query($query)->read();
        $userprofile = count($response);

        $query = (new Query('/ip/hotspot/user/print'));
        $response = $client->query($query)->read();
        $user = count($response);
        return view('dashboard.index', compact('active', 'user', 'userprofile'));
    }
}
