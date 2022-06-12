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
                            <th>Action</th>
                        </tr>

                        @foreach ($barangmasuk as $key => $brgMasukindex)
                        <tr>
                            <td>{{ $barangmasuk->firstItem() + $key }}</td>
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
                            <td class="d-flex">
                                <a href="{{ route('barangmasuk.edit', $brgMasukindex->id) }}" class="btn btn-primary mr-1">Edit</a>
                                <form action="{{ route('barangmasuk.destroy', $brgMasukindex->id) }}" method="post">
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

        {{ $barangmasuk->links() }}
    </section>
</div>
@endsection()