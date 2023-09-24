@include('layouts.header')
@include('layouts.sidebar')

<?php
$totalPrice = DB::table('history')->sum('price');
// Mengambil total pendapatan bulanan dari tabel 'history' berdasarkan kolom 'created_at' yang merupakan tanggal
$monthlyIncome = DB::table('history')
    ->whereMonth('created_at', now()->month) // Ambil data untuk bulan saat ini
    ->sum('price');

// Mengambil total pendapatan harian dari tabel 'history' berdasarkan kolom 'created_at' yang merupakan tanggal
$dailyIncome = DB::table('history')
    ->whereDate('created_at', now()) // Ambil data untuk hari ini
    ->sum('price');

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card info-card active-card">
                            <div class="card-body">
                                <h5 class="card-title">User Active</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4>{{ $active }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card info-card users-card">
                            <div class="card-body">
                                <h5 class="card-title">Users Profile</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-square"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4>{{ $userprofile - 1 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card info-card profile-card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4>{{ $user - 1 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card info-card income-card">
                            <div class="card-body">
                                <h5 class="card-title">Income Total</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4 id="total-price">Rp <?php echo number_format($totalPrice, 2, ',', '.'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card info-card income-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter
                                            <label for="filter-month" class="ml-3">Filter Bulan:</label>
                                            <input type="month" class="form-control ml-2" id="filter-month">
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Income Monthly</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4 id="monthly-income-placeholder">Rp ...</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card info-card income-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter
                                            <label for="filter-date">Filter Tanggal:</label>
                                            <input type="date" class="form-control ml-2" id="filter-date">
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Income Daily</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h4 id="daily-income-placeholder">Rp ...</h4>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer');
<script>
    document.getElementById('filter-date').addEventListener('change', function() {
        var selectedDate = this.value;
        fetch('/dashboard/filter?filter_date=' + selectedDate)
            .then(response => response.json())
            .then(data => {
                var dailyIncomeElement = document.getElementById('daily-income-placeholder');
                dailyIncomeElement.innerText = 'Rp ' + data.dailyIncomeFormatted;
            });
    });

    document.getElementById('filter-month').addEventListener('change', function() {
        var selectedMonth = this.value;
        fetch('/dashboard/filter?filter_month=' + selectedMonth)
            .then(response => response.json())
            .then(data => {
                var monthlyIncomeElement = document.getElementById('monthly-income-placeholder');
                monthlyIncomeElement.innerText = 'Rp ' + data.monthlyIncomeFormatted;
            });
    });
</script>


