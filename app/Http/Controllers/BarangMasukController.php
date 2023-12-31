<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $users = Users::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $barang_masuk = Barangmasuk::when($request->search, function ($query) use ($request) {
            $query->join('users', 'barang_masuk.user_id', '=', 'users.id')
                ->join('supplier', 'barang_masuk.supplier_id', '=', 'supplier.id')
                ->join('barang', 'barang_masuk.barang_id', '=', 'barang.id')
                ->where('barang.namaBarang', 'LIKE', '%' . $request->search . '%')
                ->orwhere('barang_masuk.tglMasuk', 'LIKE', '%' . $request->search . '%')
                ->select(
                    'barang_masuk.*',
                    'users.nama AS users_nama',
                    'supplier.nama AS supplier_nama',
                    'barang.namaBarang AS barang_namaBarang'
                );
        })->simplePaginate(5);

        return view('pages.barangmasuk.index', compact('users', 'supplier', 'barang', 'barang_masuk'));
    }

    public function create()
    {
        $users = Users::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pages.barangmasuk.tambah', compact('users', 'supplier', 'barang'));
    }

    public function store(Request $request)
    {
        $data =
            [
                'barang_id' => $request->barang_id,
                'supplier_id' => $request->supplier_id,
                'tglMasuk' => $request->tglMasuk,
                'jmlBarang' => $request->jmlBarang,
                'user_id' => $request->user_id
            ];

        Barangmasuk::create($data);

        $stok = Barang::where('id', $request->barang_id)->pluck('stok');
        $stokBaru = $stok[0] + $request->jmlBarang;
        Barang::find($request->barang_id)
            ->update([
                'stok' => $stokBaru
            ]);

        return redirect()->route('barangmasuk.index')->with('berhasil', 'Data Barang Masuk Baru Berhasil Ditambahkan!');
    }
}
