@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Hotspot</li>
                <li class="breadcrumb-item active">Users Profile</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users {{ $userprofile_count }} Items</h5>
                        <div class="table-responsive">
                            <table class="table small" id="user-table">
                                <thead>
                                    <tr>
                                        {{-- <th style="visibility: hidden;">.id</th> --}}
                                        <th>Name</th>
                                        <th>Shared Users</th>
                                        <th class="text-right">Rate Limit</th>
                                        <th class="align-middle">Expired Mode</th>
                                        <th class="text-right">Validity</th>
                                        <th class="text-right align-middle">Price Rp</th>
                                        <th class="text-right align-middle">Selling Price Rp</th>
                                        <th class="text-right">Lock User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userprofile_data as $item)
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['shared-users'] }}</td>
                                            <td>{{ $item['rate-limit'] ?? 'N/A' }}</td>
                                            <td>{{ $item['expired-mode'] ?? 'N/A' }}</td> 
                                            <td>{{ $item['validity'] ?? 'N/A' }}</td>
                                            <td>{{ $item['price'] ?? 'N/A' }}</td>
                                            <td>{{ $item['selling-price'] ?? 'N/A' }}</td>
                                            <td>{{ $item['lock-user'] ?? 'N/A' }}</td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
{{-- @include('layouts.footer') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user-table').DataTable();
    });
</script>
