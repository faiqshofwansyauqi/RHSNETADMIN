@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profile User</h5>
                        <form action="{{ route('user.update', $users->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="text" name="namaprofile" placeholder="Masukkan Nama Profile"
                                value="{{ $users->namaprofile }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mikrotik</label>
                            <input type="text" name="kodemikhon" placeholder="Masukkan Kode Mikhmon"
                                value="{{ $users->kodemikhon }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Speed</label>
                            <input type="text" name="speed" placeholder="Masukkan Speed"
                                value="{{ $users->speed }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kouta</label>
                            <input type="text" name="kuota" placeholder="Masukkan Kouta"
                                value="{{ $users->kuota }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Durasi</label>
                            <input type="text" name="durasi" placeholder="Masukkan Kode Mikhmon"
                                value="{{ $users->durasi }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Satuan Durasi</label>
                            <input type="text" name="satuandurasi" placeholder="Masukkan Satuan Durasi"
                                value="{{ $users->satuandurasi }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" placeholder="Masukkan Harga"
                                value="{{ $users->harga }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" placeholder="Masukkan Jumlah"
                                value="{{ $users->jumlah }}" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                <label>Created</label>
                <textarea class="form-control" name="content" placeholder="Masukkan Content" rows="4">{{ $users->created_at }}</textarea>
            </div> --}}

                        <div class="btn-grup">
                            <a href="{{ route('user.index') }}" class="btn btn-dark">KEMBALI</a>
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
    @include('layouts.footer');
