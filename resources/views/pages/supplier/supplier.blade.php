@extends('pages.mainPage')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Supplier</h1>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="#" class="btn btn-primary">Tambah Supplier</a>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>

                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->nama }}</td>
                            <td>{{ $supplier->noTelepon }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>
                                <a href="#" class="btn btn-primary mr-1">Update</a>
                                <a href="#" class="btn btn-secondary">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>

    </section>
</div>
@endsection()
