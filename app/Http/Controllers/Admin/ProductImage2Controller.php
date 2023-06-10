<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductImage2;
use App\Http\Requests\Admin\UpdateProductImage2;
use App\Models\Product2;
use App\Models\ProductImage2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImage2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimages2 = ProductImage2::orderBy('id')->paginate(12);
        return view('admin.productimage2.index', [
            'productimages2' => $productimages2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products2 = Product2::all();
        return view('admin.productimage2.create', [
            'products2' => $products2
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductImage2 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductImage2 $request)
    {
        $data = $request->all();
        $data['image'] = ProductImage2::uploadImage($request);

        if (ProductImage2::create($data)) {
            return redirect()->route('productimage2.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productimage2.index')->with('message', "unable to created");
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
    public function edit(ProductImage2 $productimage2)
    {
        $product2 = Product2::all();
        return view('admin.productimage2.edit', [
            'product2' => $product2,
            'productimage2' => $productimage2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductImage2  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImage2 $request, $id)
    {
        if (!ProductImage2::find($id)) {
            return redirect()->route('productimage2.index')->with('message', "not fount");
        }

        $productimage2 = ProductImage2::find($id);

        $data = $request->all();
        $data['image'] = ProductImage2::updateImage($request, $productimage2);

        if ($productimage2->update($data)) {
            return redirect()->route('productimage2.index')->with('message', "changed successfully");
        }
        return redirect()->route('productimage2.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ProductImage2::find($id)) {
            return redirect()->route('productimage2.index')->with('message', "Product Image not found");
        }

        $productimage2 = ProductImage2::find($id);

        if (File::exists(public_path() . $productimage2->image)) {
            File::delete(public_path() . $productimage2->image);
        }

        if ($productimage2->delete()) {
            return redirect()->route('productimage2.index')->with('message', "deleted successfully");
        }
        return redirect()->route('productimage2.index')->with('message', "unable to delete");
    }
}
