@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang Keluar</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <label>Nama Barang</label>
                                <select name="barang_id" class="form-control" required="">
                                    @foreach($barang as $brg)
                                    <option value="{{$brg->id}}">{{$brg->namaBarang}} | Stok : {{$brg->stok}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>Tanggal Keluar</label>
                                <input type="date" name="tglKeluar" class="form-control" value="{{ old('tglKeluar') }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Jumlah Barang</label>
                                <input type="number" name="jmlBarang" class="form-control" value="{{ old('jmlBarang') }}" required>
                                <small class="form-text text-danger">PASTIKAN JUMLAH BARANG KELUAR TIDAK MELEBIHI STOK BARANG SAAT INI</small>
                            </div>

                            <div class="form-group mb-4">
                                <label>User</label>
                                <select name="user_id" class="form-control" required="">
                                    @foreach($users as $us)
                                    <option value="{{$us->id}}">{{$us->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-flex justify-conternt-between">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <a href="{{ route('barangkeluar.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>

@endsection()