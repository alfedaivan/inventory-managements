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
            <div class="card-header justify-content-between">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
                <div class="d-flex align-items-center">
                    <form method="get" style="margin-right: 10px">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $request->search }}" placeholder="Search" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary rounded-left-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-primary px-1" href="{{url('/kategori')}}">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z" />
                        </svg>
                    </a>
                </div>
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
                                <a href="{{ route('kategori.edit', $kategoriindex->id) }}" class="btn btn-warning mr-1">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('kategori.destroy', $kategoriindex->id) }}" method="post">
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

        {{ $kategori->links() }}
    </section>
</div>
@endsection()