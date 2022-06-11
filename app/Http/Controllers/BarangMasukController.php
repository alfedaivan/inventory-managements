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
        $barangmasuk = Barangmasuk::when($request->search, function ($query) use ($request) {
            $query->join('users', 'barangMasuk.user_id', '=', 'users.id')
                ->join('supplier', 'barangMasuk.supplier_id', '=', 'supplier.id')
                ->join('barang', 'barangMasuk.barang_id', '=', 'barang.id')
                ->where('barang.namaBarang', 'LIKE', '%' . $request->search . '%')
                ->select(
                    'barangMasuk.*',
                    'users.nama AS users_nama',
                    'supplier.nama AS supplier_nama',
                    'barang.namaBarang AS barang_namaBarang'
                );
        })->simplePaginate(5);

        return view('pages.barangmasuk.index', compact('users', 'supplier', 'barang', 'barangmasuk'));
    }

    public function create()
    {
        $users = Users::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pages.barangmasuk.tambah', compact('users', 'supplier', 'barang'));
    }

    public function edit($id)
    {
        $users = Users::all();
        $supplier = Supplier::all();
        $barang = Barang::all();

        $data['barangmasuk'] = Barangmasuk::find($id);
        return view('pages.barangmasuk.edit', compact('users', 'supplier', 'barang'), $data);
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

        return redirect()->route('barangmasuk.index')->with('berhasil', 'Data Barang Masuk Baru Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);

        $data =
            [
                'barang_id' => $request->barang_id,
                'supplier_id' => $request->supplier_id,
                'tglMasuk' => $request->tglMasuk,
                'jmlBarang' => $request->jmlBarang,
                'user_id' => $request->user_id
            ];

        $barangmasuk->update($data);

        return redirect()->route('barangmasuk.index')->with('berhasil', 'Data Barang Masuk Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $barangmasuk = Barangmasuk::find($id);
        $barangmasuk->delete();

        return redirect()->route('barangmasuk.index')->with('berhasil', 'Data Barang Masuk Berhasil Terhapus!');
    }
}
