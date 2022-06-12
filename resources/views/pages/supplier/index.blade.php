@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Supplier</h1>
        </div>

        @if(session()->has('berhasil'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('berhasil') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <div class="card">
          <div class="card-header">
            <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah Supplier</a>
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

                @foreach ($supplier as $key => $supplierindex)
                    <tr>
                        <td>{{ $supplier->firstItem() + $key }}</td>
                        <td>{{ $supplierindex->nama }}</td>
                        <td>{{ $supplierindex->noTelepon }}</td>
                        <td>{{ $supplierindex->alamat }}</td>
                        <td class="d-flex">
                            <a href="{{ route('supplier.edit', $supplierindex->id) }}" class="btn btn-primary mr-1">Edit</a>
                            <form action="{{ route('supplier.destroy', $supplierindex->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>

        {{ $supplier->links() }}
    </section>
</div>
@endsection()
