@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang</h1>
        </div>

        <form action="{{ route('barang.store') }}" method="post">
            @csrf
            <div class="form-group mb-2">
                <label>Nama</label>
                <input type="text" name="namaBarang" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" required="" name="kategori_id">
                    @foreach($kategori as $k)
                      <option value="{{$k->id}}">{{$k->kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select class="form-control" required="" name="supplier_id">
                    @foreach($supplier as $s)
                      <option value="{{$s->id}}">{{$s->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input name="foto" type="file" class="form-control" required="">
             </div>
            <div class="form-group d-flex justify-conternt-between">
                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </section>
</div>

@endsection()
