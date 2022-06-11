<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $barang = Barang::orderBy('barang.id', 'asc')
                    ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
                    ->join('supplier', 'barang.supplier_id', '=', 'supplier.id')
                    ->simplePaginate(5, array('barang.id','barang.namaBarang',
                                            'kategori.kategori as kategori',
                                            'barang.harga','barang.stok', 'barang.foto',
                                            'barang.created_at', 'barang.updated_at',
                                            'supplier.nama as supplier'));
        return view('pages.barang.index', compact('barang','kategori', 'supplier'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('pages.barang.tambah');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'namaBarang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        $file = $request->file('foto');

        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        Barang::create([
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id,
            'foto' => $nama_file
        ]);

        return redirect()->route('kategori.index')->with('berhasil', 'Data Kategori Baru Berhasil Ditambahkan!');
    }


}
