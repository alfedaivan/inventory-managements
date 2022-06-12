<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function Index(){
        $barang = Barang::all()->count();
        $kategori = Kategori::all()->count();
        $supplier = Supplier::all()->count();
        return view('pages.dashboard.dashboard', compact('barang', 'kategori', 'supplier'));
    }
}
