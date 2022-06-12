<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        // $barang = Barang::orderBy('barang.id', 'asc')
        //     ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
        //     ->join('supplier', 'barang.supplier_id', '=', 'supplier.id')
        //     ->simplePaginate(5, array(
        //         'barang.id', 'barang.namaBarang',
        //         'kategori.kategori as kategori',
        //         'barang.harga', 'barang.stok', 'barang.foto',
        //         'barang.created_at', 'barang.updated_at',
        //         'supplier.nama as supplier'
        //     ));

        $barang = Barang::when($request->search, function ($query) use ($request) {
            $query->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
                ->join('supplier', 'barang.supplier_id', '=', 'supplier.id')
                ->where('barang.namaBarang', 'LIKE', '%' . $request->search . '%')
                ->orwhere('supplier.nama', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kategori.kategori', 'LIKE', '%' . $request->search . '%')
                ->orwhere('barang.created_at', 'LIKE', '%' . $request->search . '%')
                ->orwhere('barang.updated_at', 'LIKE', '%' . $request->search . '%')
                ->select(
                    'barang.*',
                    'kategori.kategori as kategori',
                    'supplier.nama AS supplier_nama',
                );
        })->simplePaginate(5);
        return view('pages.barang.index', compact('barang', 'kategori', 'supplier'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('pages.barang.tambah', compact('kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $this->validate($request, [
            'namaBarang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Barang::create([
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id,
            'foto' => $imageName
        ]);

        return redirect()->route('barang.index')->with('berhasil', 'Data Barang Baru Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $data['barang'] = Barang::find($id);
        return view('pages.barang.edit', $data, compact('kategori', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $supplier = Supplier::all();

        $imageName = $request->hidden_image;
        $file = $request->file('foto');

        if ($file != '') {
            $this->validate($request, [
                'namaBarang' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'kategori_id' => 'required',
                'supplier_id' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $imageName = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images';
            $file->move($tujuan_upload, $imageName);
        } else {
            $request->validate([
                'namaBarang' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'kategori_id' => 'required',
                'supplier_id' => 'required',
            ]);
        }

        $form_data = array(
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id,
            'foto' => $imageName
        );
        Barang::where('id', $id)->update($form_data);

        return redirect()->route('barang.index')->with('berhasil', 'Data Barang Masuk Berhasil Diubah!');
    }

    // delete
    public function destroy($id)
    {
        $supplier = Barang::find($id);
        $supplier->delete();

        return redirect()->route('barang.index')->with('berhasil', 'Data Barang Berhasil Terhapus!');
    }
}
