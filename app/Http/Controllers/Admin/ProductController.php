<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProduct;
use App\Http\Requests\Admin\UpdateProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id')->paginate(12);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorires = Category::all();

        return view('admin.product.create', [
            'categories' => $categorires
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        $data = $request->all();
        $data['image'] = Product::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Product::create($data)) {
            return redirect()->route('product.index')->with('message', "Product created seccessfully");
        }
        return redirect()->route('product.index')->with('message', "unable to created Product");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('admin.product.edit', [
            'category' => $category,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        if (!Product::find($id)) {
            return redirect()->route('product.index')->with('message', "Product not fount");
        }

        $product = Product::find($id);

        $data = $request->all();
        $data['image'] = Product::updateImage($request, $product);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($product->update($data)) {
            return redirect()->route('product.index')->with('message', "Product changed successfully");
        }
        return redirect()->route('product.index')->with('message', "Unable to update Product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Product::find($id)) {
            return redirect()->route('product.index')->with('message', "Product not found");
        }

        $product = Product::find($id);

        if (File::exists(public_path() . $product->image)) {
            File::delete(public_path() . $product->image);
        }

        if ($product->delete()) {
            return redirect()->route('product.index')->with('message', "Product deleted successfully");
        }
        return redirect()->route('product.index')->with('message', "unable to delete Product");
    }
}
