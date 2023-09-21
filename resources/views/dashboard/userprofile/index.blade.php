@include('layouts.header');
@include('layouts.sidebar');
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <a href="{{ route('user.create') }}" class="btn btn-md btn-primary"
                            style="margin-bottom: 10px">Tambah Data</a>
                        <!-- Table with stripped rows -->
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Shared Users</th>
                                    <th scope="col">Rate Limit</th>
                                    <th scope="col">Expired Mode</th>
                                    <th scope="col">Validity</th>
                                    <th scope="col">Price Rp</th>
                                    <th scope="col">Salling Price Rp</th>
                                    <th scope="col">lock User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->namaprofile }}</td>
                                        <td>{{ $user->kodemikhon }}</td>
                                        <td>{{ $user->speed }}</td>
                                        <td>{{ $user->kuota }}</td>
                                        <td>{{ $user->durasi }}</td>
                                        <td>{{ $user->satuandurasi }}</td>
                                        <td>{{ $user->harga }}</td>
                                        <td>{{ $user->jumlah }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> <!-- Ikon Edit -->
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i> <!-- Ikon Hapus -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
    
</main>
@include('layouts.footer');

