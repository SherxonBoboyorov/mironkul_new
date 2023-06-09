<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductImage1;
use App\Http\Requests\Admin\UpdateProductImage1;
use App\Models\Product1;
use App\Models\ProductImage1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImage1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimages1 = ProductImage1::orderBy('id')->paginate(12);
        return view('admin.productimage1.index', [
            'productimages1' => $productimages1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products1 = Product1::all();
        return view('admin.productimage1.create', [
            'products1' => $products1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductImage1  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductImage1 $request)
    {
        $data = $request->all();
        $data['image'] = ProductImage1::uploadImage($request);

        if (ProductImage1::create($data)) {
            return redirect()->route('productimage1.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productimage1.index')->with('message', "unable to created");
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
    public function edit(ProductImage1 $productimage1)
    {
        $product1 = Product1::all();
        return view('admin.productimage1.edit', [
            'product1' => $product1,
            'productimage1' => $productimage1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductImage1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImage1 $request, $id)
    {
        if (!ProductImage1::find($id)) {
            return redirect()->route('productimage1.index')->with('message', "not fount");
        }

        $productimage1 = ProductImage1::find($id);

        $data = $request->all();
        $data['image'] = ProductImage1::updateImage($request, $productimage1);

        if ($productimage1->update($data)) {
            return redirect()->route('productimage1.index')->with('message', "changed successfully");
        }
        return redirect()->route('productimage1.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ProductImage1::find($id)) {
            return redirect()->route('productimage1.index')->with('message', "Product Image not found");
        }

        $productimage1 = ProductImage1::find($id);

        if (File::exists(public_path() . $productimage1->image)) {
            File::delete(public_path() . $productimage1->image);
        }

        if ($productimage1->delete()) {
            return redirect()->route('productimage1.index')->with('message', "deleted successfully");
        }
        return redirect()->route('productimage1.index')->with('message', "unable to delete");
    }
}
