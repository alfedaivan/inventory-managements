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
          <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                  <th>Email</th>
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
                            <a href="{{ route('user.edit', $usersindex->id) }}" class="btn btn-primary mr-1">Edit</a>
                            <form action="{{ route('user.destroy', $usersindex->id) }}" method="post">
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

        {{ $users->links() }}
    </section>
</div>
@endsection()
