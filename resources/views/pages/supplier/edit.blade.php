@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Supplier</h1>
        </div>
        
        <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $supplier->nama) }}" required>
            </div>
            <div class="form-group mb-2">
                <label>Nomor Telepon</label>
                <input type="number" name="noTelepon" class="form-control" value="{{ old('noTelepon', $supplier->noTelepon) }}" required>
            </div>
            <div class="form-group mb-4">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $supplier->alamat) }}</textarea>
            </div>
            <div class="form-group d-flex justify-conternt-between">
                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </section>
</div>

@endsection()
