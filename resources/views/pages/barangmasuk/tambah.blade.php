@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang Masuk</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangmasuk.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Nama Barang</label>
                                <select name="barang_id" class="form-control" required="">
                                    @foreach($barang as $brg)
                                    <option value="{{$brg->id}}">{{$brg->namaBarang}} | Kode Barang : {{$brg->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Supplier</label>
                                <select name="supplier_id" class="form-control" required="">
                                    @foreach($supplier as $sp)
                                    <option value="{{$sp->id}}">{{$sp->nama}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">PASTIKAN SUPPLIER SAMA DENGAN SUPPLIER DI LIST BARANG MENGGUNAKAN KODE BARANG</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tglMasuk" class="form-control" value="{{ old('tglMasuk') }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Jumlah Barang</label>
                                <input type="number" name="jmlBarang" class="form-control" value="{{ old('jmlBarang') }}" required>
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
                                <a href="{{ route('barangmasuk.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>

@endsection()
