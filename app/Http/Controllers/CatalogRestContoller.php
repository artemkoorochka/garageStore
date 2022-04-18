<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogRestContoller extends Controller
{
    public function list(){
        return ["data" => Category::all()->toArray()];
    }
}
