<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data['barang'] = Barang::simplePaginate(5);
        return view('pages.barang.index', $data);

        //  Barang::join('barang', 'barang.kategori_id', '=', 'kategori.kategori_id' )
        //                             ->get(['kategori.kategori'])
        //                             ->implePaginate(5);
    }
}
