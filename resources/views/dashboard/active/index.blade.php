@include('layouts.header');
@include('layouts.sidebar');
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users Active</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Hotspot</li>
                <li class="breadcrumb-item active">Active</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hotspot Active {{ $active_user }} Items</h5>
                        <div class="table-responsive">
                            <table class="table small" id="active-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>User</th>
                                        <th>Address</th>
                                        <th>Mac Address</th>
                                        <th class="text-right">Uptime</th>
                                        <th class="text-right">Bytes In</th>
                                        <th class="text-right">Bytes Out</th>
                                        <th class="text-right">Time Left</th>
                                        <th>Login By</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotspotActiveData as $item)
                                        <tr>
                                            <td>{{ $item['server'] }}</td>
                                            <td>{{ $item['user'] }}</td>
                                            <td>{{ $item['address'] }}</td>
                                            <td>{{ $item['mac-address'] }}</td>
                                            <td style="text-align:right;">{{ formatDTM($item['uptime']) }}</td>
                                            <td style="text-align:right;">{{ formatBytes($item['bytes-in']) }}</td>
                                            <td style="text-align:right;">{{ formatBytes($item['bytes-out']) }}</td>
                                            <td>{{ isset($item['session-time-left']) ? formatDTM($item['session-time-left']) : 'N/A' }}
                                            </td>
                                            <td>{{ $item['login-by'] }}</td>
                                            <td>{{ isset($item['comment']) ? $item['comment'] : '' }}</td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#active-table').DataTable();
        });
    </script>
</main>
@include('layouts.footer');