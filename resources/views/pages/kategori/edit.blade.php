@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Kategori</h1>
        </div>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $kategori->kategori) }}" required>
            </div>
            <div class="form-group d-flex justify-conternt-between">
                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </section>
</div>

@endsection()