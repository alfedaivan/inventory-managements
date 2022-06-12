@extends('pages.mainPage')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List User</h1>
        </div>

        @if(session()->has('berhasil'))
        <div class="alert alert-success">
            {{ session()->get('berhasil') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header justify-content-between">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
                <div class="card-header-form">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary rounded-left-0" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fas fa-search"></i></button>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($users as $key => $usersindex)
                        <tr>
                            <td>{{ $users->firstItem() + $key }}</td>
                            <td>{{ $usersindex->nama }}</td>
                            <td>{{ $usersindex->email }}</td>
                            <td>{{ $usersindex->noTelepon }}</td>
                            <td>{{ $usersindex->alamat }}</td>
                            <td>{{ $usersindex->created_at }}</td>
                            <td>{{ $usersindex->updated_at }}</td>
                            <td class="d-flex">
                                <a href="{{ route('user.edit', $usersindex->id) }}" class="btn btn-warning mr-1">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('user.destroy', $usersindex->id) }}" method="post">
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

        {{ $users->links() }}
    </section>
</div>
@endsection()
