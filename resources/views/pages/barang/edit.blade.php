@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Barang</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label>Nama</label>
                                <input type="text" name="namaBarang" class="form-control" value="{{ old('namaBarang', $barang->namaBarang) }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" required>
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
                                <input name="foto" type="file" class="form-control p-2" value="{{ url('/images'.$barang->foto) }}" data-default-file="{{ url('/images'.$barang->foto) }}">
                                <input name="hidden_image" type="hidden" class="form-control" value="{{$barang->foto}}">
                            </div>
                            <div class="form-group d-flex justify-conternt-between">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection()
