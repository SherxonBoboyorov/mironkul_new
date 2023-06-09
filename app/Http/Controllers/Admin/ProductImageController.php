<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductImage;
use App\Http\Requests\Admin\UpdateProductImage;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimages = ProductImage::orderBy('id')->paginate(12);
        return view('admin.productimage.index', [
            'productimages' => $productimages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.productimage.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductImage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductImage $request)
    {
        $data = $request->all();
        $data['image'] = ProductImage::uploadImage($request);

        if (ProductImage::create($data)) {
            return redirect()->route('productimage.index')->with('message', "Product Image created seccessfully");
        }
        return redirect()->route('productimage.index')->with('message', "unable to created Product Image");
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
    public function edit(ProductImage $productimage)
    {
        $prodcut = Product::all();
        return view('admin.productimage.edit', [
            'product' => $prodcut,
            'productimage' => $productimage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductImage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImage $request, $id)
    {
        if (!ProductImage::find($id)) {
            return redirect()->route('productimage.index')->with('message', "Product Image not fount");
        }

        $productimage = ProductImage::find($id);

        $data = $request->all();
        $data['image'] = ProductImage::updateImage($request, $productimage);

        if ($productimage->update($data)) {
            return redirect()->route('productimage.index')->with('message', "Product Image changed successfully");
        }
        return redirect()->route('productimage.index')->with('message', "Unable to update Product Image");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ProductImage::find($id)) {
            return redirect()->route('productimage.index')->with('message', "Product Image not found");
        }

        $productimage = ProductImage::find($id);

        if (File::exists(public_path() . $productimage->image)) {
            File::delete(public_path() . $productimage->image);
        }

        if ($productimage->delete()) {
            return redirect()->route('productimage.index')->with('message', "Product Image deleted successfully");
        }
        return redirect()->route('productimage.index')->with('message', "unable to delete Product Image ");
    }
}
