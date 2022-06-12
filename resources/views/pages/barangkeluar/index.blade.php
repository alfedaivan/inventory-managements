@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rekaman Data Barang Keluar</h1>
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
                <a href="{{ route('barangkeluar.create') }}" class="btn btn-primary">Tambah Barang Keluar</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Keluar</th>
                            <th>Jumlah Barang</th>
                            <th>Nama User</th>
                        </tr>

                        @foreach ($barangkeluar as $key => $brgKeluarindex)
                        <tr>
                            <td>{{ $barangkeluar->firstItem() + $key }}</td>
                            <td>
                                @foreach($barang as $brg)
                                @if($brgKeluarindex->barang_id == $brg->id)
                                {{ $brg->namaBarang }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $brgKeluarindex->tglKeluar }}</td>
                            <td>{{ $brgKeluarindex->jmlBarang }}</td>
                            <td>
                                @foreach($users as $us)
                                @if($brgKeluarindex->user_id == $us->id)
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

        {{ $barangkeluar->links() }}
    </section>
</div>
@endsection()