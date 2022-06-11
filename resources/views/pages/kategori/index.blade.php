@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Kategori</h1>
        </div>

        @if(session()->has('berhasil'))
        <div class="alert alert-success">
            {{ session()->get('berhasil') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($kategori as $key => $kategoriindex)
                        <tr>
                            <td>{{ $kategori->firstItem() + $key }}</td>
                            <td>{{ $kategoriindex->kategori }}</td>
                            <td class="d-flex">
                                <a href="{{ route('kategori.edit', $kategoriindex->id) }}" class="btn btn-primary mr-1">Edit</a>
                                <form action="{{ route('kategori.destroy', $kategoriindex->id) }}" method="post">
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

        {{ $kategori->links() }}
    </section>
</div>
@endsection()