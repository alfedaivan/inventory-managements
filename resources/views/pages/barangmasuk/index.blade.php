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
            <div class="card-header justify-content-between">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary">Tambah Barang</a>
                <div class="card-header-form">
                    <form method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ request()->get('search') }}" placeholder="Search" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary rounded-left-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
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