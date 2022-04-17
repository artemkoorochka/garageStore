<?php

namespace App\Http\Controllers;

use App\Models\Product,
    App\Models\Category,
    App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function catalogList()
    {
        $products = Product::paginate(6);
        $products = compact("products");

        $categories = Category::where('parent_id', '=', 0)->get();
        $categories = compact('categories');

        return view("product.catalog", $products, $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::paginate(10);
        $products = compact("products");

        return view("product.admin", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $categories = compact('categories');
        return view("product.create", $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        // Product::create(array_merge($request->only(["name", "price"]), ["currency" => "$"]));

        $product = new Product;
        $product->name = $request->post("name");
        $product->price = $request->post("price");
        $product->currency = "$";
        $product->save();

        $category = $request->post("category");

        if(!empty($category)){
            $category = Category::find($category);
            $product->categories()->attach($category);
        }

        return redirect()->route("products.index")->withInfo($request->name . ' is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {

        return view("product.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $product = compact("product");

        $categories = Category::where('parent_id', '=', 0)->get();
        $categories = compact('categories');

        return view("product.edit", $product, $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, int  $id)
    {
        $product = Product::find($id);
        $product->update($request->only(['name', 'price']));

        $product->categories()->detach();
        $category = $request->post("category");
        if(!empty($category)){
            $category = Category::find($category);
            $product->categories()->attach($category);
        }

        return redirect()->route("products.edit", $id)->withInfo('Updated product - ' . $product->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("products.index")->withInfo('Product "' . $product->name . '" is deleted');
    }
}
