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
            <div class="card-header justify-content-between">
                <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
                <div class="d-flex align-items-center">
                    <form method="GET" style="margin-right: 10px">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary rounded-left-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-primary px-1" href="{{url('/barang')}}">
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
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Update</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($barang as $key => $barangindex)
                        <tr>
                            <td>{{ $barang->firstItem() + $key }}</td>
                            <td><img src="{{ url('/images/'.$barangindex->foto) }}" height="75" width="75" alt="" /></td>
                            <td>{{ $barangindex->namaBarang }}</td>
                            <td>
                                @foreach($kategori as $k)
                                @if($barangindex->kategori_id == $k->id)
                                {{ $k->kategori }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $barangindex->harga }}</td>
                            <td>{{ $barangindex->stok }}</td>
                            <td>
                                @foreach($supplier as $s)
                                @if($barangindex->supplier_id == $s->id)
                                {{ $s->nama }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $barangindex->created_at }}</td>
                            <td>{{ $barangindex->updated_at }}</td>
                            <td class="d-flex">
                                <a href="{{ route('barang.edit', $barangindex->id) }}" class="btn btn-warning mr-1">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('barang.destroy', $barangindex->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a type="submit" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger text-white">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                        </svg>
                                    </a>
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
