@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan Omset</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Report</li>
                <li class="breadcrumb-item active">Laporan Omset</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="form-inline mb-3">
                            <label for="filter-date">Filter Tanggal:</label>
                            <input type="date" class="form-control ml-2" id="filter-date">
                            <label for="filter-month" class="ml-3">Filter Bulan:</label>
                            <input type="month" class="form-control ml-2" id="filter-month">
                            <label for="total-price">Total Price:</label>
                            <input type="text" class="form-control" id="total-price" readonly>
                        </div>
                        <div class="table-responsive">
                            <table class="table small" id="history-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Lokasi</th>
                                        <th>Code</th>
                                        <th>Tanggal</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Jenis Voucher</th>
                                        <th>Email</th>
                                        <th>Price</th>
                                        <th>Paid</th>
                                        <th>Duitku_ref</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer');
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#history-table').DataTable({
            processing: false,
            serverSide: true,
            scrollX: true,
            paging: false,
            ajax: '{{ route('omset.data') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'id_lokasi',
                    name: 'id_lokasi'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        var date = new Date(data);
                        var year = date.getFullYear();
                        var month = (date.getMonth() + 1).toString().padStart(2, '0');
                        var day = date.getDate().toString().padStart(2, '0');
                        return year + '-' + month + '-' + day;
                    }
                },
                {
                    data: 'method',
                    name: 'method'
                },
                {
                    data: 'crm_name',
                    name: 'crm_name'
                },
                {
                    data: 'crm_email',
                    email: 'crm_email'
                },
                {
                    data: 'price',
                    name: 'price',
                    render: function(data) {
                        var price = parseFloat(data);
                        return 'Rp ' + price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    }
                },
                {
                    data: 'paid',
                    name: 'paid'
                },
                {
                    data: 'duitku_ref',
                    name: 'duitku_ref'
                },
                {
                    data: 'type',
                    name: 'type'
                },
            ]
        });
        table.on('draw', function() {
            var data = table.column('price:name').data();
            var total = data.reduce(function(sum, value) {
                return sum + parseFloat(value);
            }, 0);

            $('#total-price').val('Rp ' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        });
        table.draw();
        $('#filter-date').on('change', function() {
            var selectedDate = $(this).val();
            table.column('created_at:name').search(selectedDate).draw();
        });
        $('#filter-month').on('change', function() {
            var selectedMonth = $(this).val();
            table.column('created_at:name').search(selectedMonth, true, false).draw();
        });
    });
</script>