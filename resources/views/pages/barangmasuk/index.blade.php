@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Barang Masuk</h1>
        </div>

        @if(session()->has('berhasil'))
        <div class="alert alert-success">
            {{ session()->get('berhasil') }}
        </div>
        @endif

        <div class="card">
            <form method="GET" class="form-inline">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" title="Cari berdasarkan nama ruangan / nama barang" placeholder="Search" value="{{ request()->get('search') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <div class="card-header">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>
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