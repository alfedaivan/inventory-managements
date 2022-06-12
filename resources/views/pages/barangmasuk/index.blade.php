@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rekaman Data Barang Masuk</h1>
        </div>

        @if(session()->has('berhasil'))
        <div class="alert alert-success">
            {{ session()->get('berhasil') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header justify-content-between">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>
                <div class="d-flex align-items-center">
                    <form method="GET" class="form-inline" style="margin-right: 10px">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}" placeholder="Search" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary rounded-left-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-primary px-1" href="{{url('/barangmasuk')}}">
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
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Barang</th>
                            <th>Nama User</th>
                        </tr>

                        @foreach ($barang_masuk as $key => $brgMasukindex)
                        <tr>
                            <td>{{ $barang_masuk->firstItem() + $key }}</td>
                            <td>
                                @foreach($barang as $brg)
                                @if($brgMasukindex->barang_id == $brg->id)
                                {{ $brg->namaBarang }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($supplier as $sp)
                                @if($brgMasukindex->supplier_id == $sp->id)
                                {{ $sp->nama }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $brgMasukindex->tglMasuk }}</td>
                            <td>{{ $brgMasukindex->jmlBarang }}</td>
                            <td>
                                @foreach($users as $us)
                                @if($brgMasukindex->user_id == $us->id)
                                {{ $us->nama }}
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        {{ $barang_masuk->links() }}
    </section>
</div>
@endsection()