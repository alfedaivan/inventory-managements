<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data['supplier'] = Supplier::simplePaginate(5);
        return view('pages.supplier.index', $data);
    }

    public function create()
    {
        return view('pages.supplier.tambah');
    }

    public function edit($id)
    {
        $data['supplier'] = Supplier::find($id);
        return view('pages.supplier.edit', $data);
    }

    //
    public function store(Request $request)
    {
        $data =
        [
            'nama' => $request->nama,
            'noTelepon' => $request->noTelepon,
            'alamat' => $request->alamat
        ];

        Supplier::create($data);

        return redirect()->route('supplier.index')->with('berhasil', 'Data Supplier Baru Berhasil Ditambahkan!');
    }

    // update
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $data =
        [
            'nama' => $request->nama,
            'noTelepon' => $request->noTelepon,
            'alamat' => $request->alamat
        ];

        $supplier->update($data);

        return redirect()->route('supplier.index')->with('berhasil', 'Data Supplier Berhasil Diubah!');
    }

    // delete
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('berhasil', 'Data Supplier Berhasil Terhapus!');
    }
}
