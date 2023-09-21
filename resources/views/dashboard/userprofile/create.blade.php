@include('layouts.header');
@include('layouts.sidebar');

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Profile</h5>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Profile</label>
                            <input type="text" name="namaprofile" placeholder="Masukkan Nama Profile"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pilih_opsi">Profile</label>
                            <select name="kodemikhon" id="pilih_opsi" class="form-control">
                                @foreach ($profile as $result)
                                    <option value={{ $result['name'] }}>{{ $result['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Speed</label>
                            <input for="hasil" type="text" name="speed" placeholder="Masukkan Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kouta</label>
                            <input type="text" name="kuota" placeholder="Masukkan Title" class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label>Batas Waktu</label>
                            <input type="text" name="durasi" placeholder="30m=30meni/1h=a1jam/1d=1hari"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" id="harga" name="harga" placeholder="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <input type="textarea" name="satuandurasi" placeholder="" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" placeholder="Masukkan Title" class="form-control">
                        </div> --}}

                        <div class="btn-grup">
                            <a href="{{ route('user.index') }}" class="btn btn-dark">KEMBALI</a>
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
</main>
    </section>
    @include('layouts.footer');