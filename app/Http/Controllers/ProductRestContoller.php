<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRestContoller extends Controller
{
    public function list()
    {
        return ["data" => Product::all()->toArray()];
    }
}
