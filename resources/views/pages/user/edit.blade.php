@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Nomor Telepon</label>
                                <input type="number" name="noTelepon" class="form-control" value="{{ old('noTelepon', $user->noTelepon) }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control summernote-simple">{{ old('alamat', $user->alamat) }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="form-group d-flex justify-conternt-between">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection()
