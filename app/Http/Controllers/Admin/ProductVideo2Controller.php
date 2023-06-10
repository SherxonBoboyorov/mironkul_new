<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductVideo2;
use App\Http\Requests\Admin\UpdateProductVideo2;
use App\Models\Product2;
use App\Models\ProductVideo2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductVideo2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productvideo2s = ProductVideo2::orderBy('id')->paginate(10);
        return view('admin.productvideo2.index', [
            'productvideo2s' => $productvideo2s
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
        return view('admin.productvideo2.create', [
            'products2' => $products2
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductVideo2  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductVideo2 $request)
    {
        $data = $request->all();
        $data['image'] = ProductVideo2::uploadImage($request);
        $data['video'] = ProductVideo2::uploadVideo($request);

        if (ProductVideo2::create($data)) {
            return redirect()->route('productvideo2.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productvideo2.index')->with('message', "unable to created");
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
    public function edit(ProductVideo2 $productvideo2)
    {
        $product2 = Product2::all();
        return view('admin.productvideo2.edit', [
            'product2' => $product2,
            'productvideo2' => $productvideo2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductVideo2  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVideo2 $request, $id)
    {
        if (!ProductVideo2::find($id)) {
            return redirect()->route('productvideo2.index')->with('message', "not fount");
        }

        $productvideo2 = ProductVideo2::find($id);

        $data = $request->all();
        $data['image'] = ProductVideo2::updateImage($request, $productvideo2);
        $data['video'] = ProductVideo2::updateVideo($request, $productvideo2);

        if ($productvideo2->update($data)) {
            return redirect()->route('productvideo2.index')->with('message', " changed successfully");
        }
        return redirect()->route('productvideo2.index')->with('message', "Unable to update ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productvideo2 = ProductVideo2::find($id);

        if (File::exists(public_path() . $productvideo2->video)) {
            File::delete(public_path() . $productvideo2->video);
        }

        if ($productvideo2->delete()) {
            return redirect()->route('productvideo2.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('productvideo2.index')->with('message', "failed to delete successfully!!!");

    }
}
