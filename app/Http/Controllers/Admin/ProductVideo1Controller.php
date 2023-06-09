<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductVideo1;
use App\Http\Requests\Admin\UpdateProductVideo1;
use App\Models\Product1;
use App\Models\ProductVideo1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductVideo1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productvideo1s = ProductVideo1::orderBy('id')->paginate(10);
        return view('admin.productvideo1.index', [
            'productvideo1s' => $productvideo1s
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
        return view('admin.productvideo1.create', [
            'products1' => $products1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductVideo1  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductVideo1 $request)
    {
        $data = $request->all();
        $data['image'] = ProductVideo1::uploadImage($request);
        $data['video'] = ProductVideo1::uploadVideo($request);

        if (ProductVideo1::create($data)) {
            return redirect()->route('productvideo1.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productvideo1.index')->with('message', "unable to created");
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
    public function edit(ProductVideo1 $productvideo1)
    {
        $product1 = Product1::all();
        return view('admin.productvideo1.edit', [
            'product1' => $product1,
            'productvideo1' => $productvideo1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductVideo1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVideo1 $request, $id)
    {
        if (!ProductVideo1::find($id)) {
            return redirect()->route('productvideo1.index')->with('message', " not fount");
        }

        $productvideo1 = ProductVideo1::find($id);

        $data = $request->all();
        $data['image'] = ProductVideo1::updateImage($request, $productvideo1);
        $data['video'] = ProductVideo1::updateVideo($request, $productvideo1);

        if ($productvideo1->update($data)) {
            return redirect()->route('productvideo1.index')->with('message', " changed successfully");
        }
        return redirect()->route('productvideo1.index')->with('message', "Unable to update ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productvideo1 = ProductVideo1::find($id);

        if (File::exists(public_path() . $productvideo1->video)) {
            File::delete(public_path() . $productvideo1->video);
        }

        if ($productvideo1->delete()) {
            return redirect()->route('productvideo1.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('productvideo1.index')->with('message', "failed to delete successfully!!!");
    }
}
