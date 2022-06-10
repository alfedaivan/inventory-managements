<?php
namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data['users'] = Users::simplePaginate(5);
        return view('pages.user.index', $data);
    }

    // add user
    public function create()
    {
        return view('pages.user.tambah');
    }

    public function store(Request $request)
    {
        $data =
        [
            'nama' => $request->nama,
            'noTelepon' => $request->noTelepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ];
        Users::create($data);
        return redirect()->route('user.index')->with('berhasil', 'Data User Baru Berhasil Ditambahkan!');
    }

    // edit
    public function edit($id)
    {
        $data['user'] = Users::find($id);
        return view('pages.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $data =
        [
            'nama' => $request->nama,
            'noTelepon' => $request->noTelepon,
            'alamat' => $request->alamat,
            'email' => $request->email
        ];

        $user->update($data);

        return redirect()->route('user.index')->with('berhasil', 'Data User Berhasil Diubah!');
    }

    // delete
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('berhasil', 'Data User Berhasil Terhapus!');
    }
}
