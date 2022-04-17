<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $menus = Category::where('parent_id', '=', 0)->get();
        $allMenus = Category::pluck('title','id')->all();
        return view('category.menuTreeview',compact('menus','allMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Category::create($input);
        return back()->withInfo('Menu added successfully.');
    }

}
