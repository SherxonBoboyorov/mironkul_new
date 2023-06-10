<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductVideo3;
use App\Http\Requests\Admin\UpdateProductVideo3;
use App\Models\Product3;
use App\Models\ProductVideo3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductVideo3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productvideo3s = ProductVideo3::orderBy('id')->paginate(10);
        return view('admin.productvideo3.index', [
            'productvideo3s' => $productvideo3s
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
        return view('admin.productvideo3.create', [
            'products3' => $products3
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProductVideo3  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductVideo3 $request)
    {
        $data = $request->all();
        $data['image'] = ProductVideo3::uploadImage($request);
        $data['video'] = ProductVideo3::uploadVideo($request);

        if (ProductVideo3::create($data)) {
            return redirect()->route('productvideo3.index')->with('message', "created seccessfully");
        }
        return redirect()->route('productvideo3.index')->with('message', "unable to created");
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
    public function edit(ProductVideo3 $productvideo3)
    {
        $product3 = Product3::all();
        return view('admin.productvideo3.edit', [
            'product3' => $product3,
            'productvideo3' => $productvideo3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProductVideo3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVideo3 $request, $id)
    {
        if (!ProductVideo3::find($id)) {
            return redirect()->route('productvideo3.index')->with('message', "not fount");
        }

        $productvideo3 = ProductVideo3::find($id);

        $data = $request->all();
        $data['image'] = ProductVideo3::updateImage($request, $productvideo3);
        $data['video'] = ProductVideo3::updateVideo($request, $productvideo3);

        if ($productvideo3->update($data)) {
            return redirect()->route('productvideo3.index')->with('message', " changed successfully");
        }
        return redirect()->route('productvideo3.index')->with('message', "Unable to update ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productvideo3 = ProductVideo3::find($id);

        if (File::exists(public_path() . $productvideo3->video)) {
            File::delete(public_path() . $productvideo3->video);
        }

        if ($productvideo3->delete()) {
            return redirect()->route('productvideo3.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('productvideo3.index')->with('message', "failed to delete successfully!!!");

    }
}
