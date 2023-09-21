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
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users {{ $users_count }} Items</h5>
                        <div class="table-responsive">
                            <table class="table small" id="users-table">
                                <thead>
                                    <tr>
                                        {{-- <th style="visibility: hidden;">.id</th> --}}
                                        <th>Server</th>
                                        <th>Name</th>
                                        <th>Profile</th>
                                        <th>Mac Address</th>
                                        <th class="text-right">Uptime</th>
                                        <th class="text-right">Bytes In</th>
                                        <th class="text-right">Bytes Out</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersdata as $item)
                                        <tr>
                                            {{-- <td style="visibility: hidden;">{{ $item['.id'] }}</td> --}}
                                            <td>{{ $item['server'] ?? 'N/A' }}</td>
                                            <td>{{ $item['name'] ?? 'N/A' }}</td>
                                            <td>{{ $item['profile'] ?? 'N/A' }}</td>
                                            <td>{{ $item['mac-address'] ?? 'N/A' }}</td>
                                            <td style="text-align:right;">{{ formatDTM($item['uptime']) }}</td>
                                            <td style="text-align:right;">{{ formatBytes($item['bytes-in']) }}</td>
                                            <td style="text-align:right;">{{ formatBytes($item['bytes-out']) }}</td>
                                            <td>{{ $item['comment'] ?? 'N/A' }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                @php
                                    function formatBytes($bytes, $precision = 2)
                                    {
                                        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
                                    
                                        $bytes = max($bytes, 0);
                                        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                                        $pow = min($pow, count($units) - 1);
                                    
                                        if ($pow < 0) {
                                            $pow = 0;
                                        }
                                    
                                        $bytes /= 1 << 10 * $pow;
                                    
                                        return round($bytes, $precision) . ' ' . $units[$pow];
                                    }
                                    
                                    function formatDTM($uptimeInSeconds)
                                    {
                                        if (!is_numeric($uptimeInSeconds)) {
                                            return $uptimeInSeconds;
                                        }
                                    
                                        $hours = floor($uptimeInSeconds / 3600);
                                        $minutes = floor(($uptimeInSeconds % 3600) / 60);
                                        $seconds = $uptimeInSeconds % 60;
                                    
                                        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                                    }
                                    
                                @endphp
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable();
    });
</script>
