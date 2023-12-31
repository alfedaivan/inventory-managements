<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Barang;
use App\Models\Barangkeluar;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {
        $users = Users::all();
        $barang = Barang::all();
        $barang_keluar = Barangkeluar::when($request->search, function ($query) use ($request) {
            $query->join('users', 'barang_keluar.user_id', '=', 'users.id')
                ->join('barang', 'barang_keluar.barang_id', '=', 'barang.id')
                ->where('barang.namaBarang', 'LIKE', '%' . $request->search . '%')
                ->orwhere('barang_keluar.tglKeluar', 'LIKE', '%' . $request->search . '%')
                ->select(
                    'barang_keluar.*',
                    'users.nama AS users_nama',
                    'barang.namaBarang AS barang_namaBarang'
                );
        })->simplePaginate(5);

        return view('pages.barangkeluar.index', compact('users', 'barang', 'barang_keluar'));
    }

    public function create()
    {
        $users = Users::all();
        $barang = Barang::all();
        return view('pages.barangkeluar.tambah', compact('users', 'barang'));
    }

    public function store(Request $request)
    {
        $data =
            [
                'barang_id' => $request->barang_id,
                'tglKeluar' => $request->tglKeluar,
                'jmlBarang' => $request->jmlBarang,
                'user_id' => $request->user_id
            ];

        Barangkeluar::create($data);

        $stok = Barang::where('id', $request->barang_id)->pluck('stok');
        $stokBaru = $stok[0] - $request->jmlBarang;
        Barang::find($request->barang_id)
            ->update([
                'stok' => $stokBaru
            ]);

        return redirect()->route('barangkeluar.index')->with('berhasil', 'Data Barang Keluar Baru Berhasil Ditambahkan!');
    }
}
