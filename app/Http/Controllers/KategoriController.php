<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::simplePaginate(5);
        return view('pages.kategori.index', $data);
    }

    public function create()
    {
        return view('pages.kategori.tambah');
    }

    public function edit($id)
    {
        $data['kategori'] = Kategori::find($id);
        return view('pages.kategori.edit', $data);
    }

    public function store(Request $request)
    {
        $data =
            [
                'kategori' => $request->kategori
            ];

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('berhasil', 'Data Kategori Baru Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $data =
            [
                'kategori' => $request->kategori
            ];

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('berhasil', 'Data Kategori Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('berhasil', 'Data Kategori Berhasil Terhapus!');
    }
}
