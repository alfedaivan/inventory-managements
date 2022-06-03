<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('pages/supplier/supplier', [
            "suppliers" => Supplier::all()
        ]);
    }
}
