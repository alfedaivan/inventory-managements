@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control"  required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Nomor Telepon</label>
                                <input type="number" name="noTelepon" class="form-control"  required>
                            </div>
                            <div class="form-group mb-4">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control summernote-simple"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-4">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group d-flex justify-conternt-between">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>




    </section>
</div>

@endsection()
