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
                                <a href="{{ route('supplier.edit', $supplierindex->id) }}" class="btn btn-warning mr-1">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('supplier.destroy', $supplierindex->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                        </svg>
                                    </button>
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
