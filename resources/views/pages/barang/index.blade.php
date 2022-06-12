@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Barang</h1>
        </div>

        @if(session()->has('berhasil'))
        <div class="alert alert-success">
            {{ session()->get('berhasil') }}
        </div>
        @endif

        <div class="card">
            <!-- <div class="card-header">
                <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div> -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Supplier</th>
                            <th>Tanggal Update</th>
                            <!-- <th>Created At</th> -->
                            <th>Tanggal Update</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($barang as $key => $barangindex)
                        <tr>
                            <td>{{ $barang->firstItem() + $key }}</td>
                            <td>{{ $barangindex->namaBarang }}</td>
                            <td>{{ $barangindex->kategori_id }}</td>
                            <td>{{ $barangindex->harga }}</td>
                            <td>{{ $barangindex->stok }}</td>
                            <td>{{ $barangindex->supplier_id }}</td>
                            <td>{{ $barangindex->updated_at }}</td>
                            <td class="d-flex">
                                <a href="{{ route('barang.edit', $barangindex->id) }}" class="btn btn-primary mr-1">Edit</a>
                                <form action="{{ route('barang.destroy', $barangindex->id) }}" method="post">
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

        {{ $barang->links() }}
    </section>
</div>
@endsection()
