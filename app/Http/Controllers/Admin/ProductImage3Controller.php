<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductImage3;
use App\Http\Requests\Admin\UpdateProductImage3;
use App\Models\Product3;
use App\Models\ProductImage3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImage3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimages3 = ProductImage3::orderBy('id')->paginate(12);
        return view('admin.productimage3.index', [
            'productimages3' => $productimages3
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products3 = Product3::all();
        return view('admin.productimage3.create', [
            'products3' => $products3
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductImage3 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductImage3 $request)
    {
        $data = $request->all();
        $data['image'] = ProductImage3::uploadImage($request);

        if (ProductImage3::create($data)) {
            return redirect()->route('productimage3.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productimage3.index')->with('message', "unable to created");
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
    public function edit(ProductImage3 $productimage3)
    {
        $product3 = Product3::all();
        return view('admin.productimage3.edit', [
            'product3' => $product3,
            'productimage3' => $productimage3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductImage3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImage3 $request, $id)
    {
        if (!ProductImage3::find($id)) {
            return redirect()->route('productimage3.index')->with('message', "not fount");
        }

        $productimage3 = ProductImage3::find($id);

        $data = $request->all();
        $data['image'] = ProductImage3::updateImage($request, $productimage3);

        if ($productimage3->update($data)) {
            return redirect()->route('productimage3.index')->with('message', "changed successfully");
        }
        return redirect()->route('productimage3.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ProductImage3::find($id)) {
            return redirect()->route('productimage3.index')->with('message', "Product Image not found");
        }

        $productimage3 = ProductImage3::find($id);

        if (File::exists(public_path() . $productimage3->image)) {
            File::delete(public_path() . $productimage3->image);
        }

        if ($productimage3->delete()) {
            return redirect()->route('productimage3.index')->with('message', "deleted successfully");
        }
        return redirect()->route('productimage3.index')->with('message', "unable to delete");
    }
}
