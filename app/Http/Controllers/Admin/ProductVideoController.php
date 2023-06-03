<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductVideo;
use App\Http\Requests\Admin\UpdateProductVideo;
use App\Models\Product;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productvideos = ProductVideo::orderBy('id')->paginate(10);
        return view('admin.productvideo.index', [
            'productvideos' => $productvideos
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
        return view('admin.productvideo.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductVideo $request)
    {
        $data = $request->all();
        $data['image'] = ProductVideo::uploadImage($request);
        $data['video'] = ProductVideo::uploadVideo($request);

        if (ProductVideo::create($data)) {
            return redirect()->route('productvideo.index')->with('message', "Product Video created seccessfully");
        }
        return redirect()->route('productvideo.index')->with('message', "unable to created Product Video");
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
    public function edit(ProductVideo $productvideo)
    {
        $product = Product::all();
        return view('admin.productvideo.edit', [
            'product' => $product,
            'productvideo' => $productvideo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVideo $request, $id)
    {
        if (!ProductVideo::find($id)) {
            return redirect()->route('productvideo.index')->with('message', "Product Video not fount");
        }

        $productvideo = ProductVideo::find($id);

        $data = $request->all();
        $data['image'] = ProductVideo::updateImage($request, $productvideo);
        $data['video'] = ProductVideo::updateVideo($request, $productvideo);

        if ($productvideo->update($data)) {
            return redirect()->route('productvideo.index')->with('message', "Product Video changed successfully");
        }
        return redirect()->route('productvideo.index')->with('message', "Unable to update Product Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productvideo = ProductVideo::find($id);

        if (File::exists(public_path() . $productvideo->video)) {
            File::delete(public_path() . $productvideo->video);
        }

        if ($productvideo->delete()) {
            return redirect()->route('productvideo.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('productvideo.index')->with('message', "failed to delete successfully!!!");
    }
}
