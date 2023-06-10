<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProduct3;
use App\Http\Requests\Admin\UpdateProduct3;
use App\Models\Product3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Product3Controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products3 = Product3::orderBy('id')->paginate(12);
        return view('admin.product3.index', compact('products3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProduct3  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct3 $request)
    {
        $data = $request->all();
        $data['image'] = Product3::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Product3::create($data)) {
            return redirect()->route('product3.index')->with('message', "created seccessfully");
        }
        return redirect()->route('product3.index')->with('message', "unable to created");
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
    public function edit($id)
    {
        $product3 = Product3::find($id);
        return view('admin.product3.edit', compact('product3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProduct3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct3 $request, $id)
    {
        if (!Product3::find($id)) {
            return redirect()->route('product3.index')->with('message', "not fount");
        }

        $product3 = Product3::find($id);

        $data = $request->all();
        $data['image'] = Product3::updateImage($request, $product3);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($product3->update($data)) {
            return redirect()->route('product3.index')->with('message', "changed successfully");
        }
        return redirect()->route('product3.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Product3::find($id)) {
            return redirect()->route('product3.index')->with('message', "not found");
        }

        $product3 = Product3::find($id);

        if (File::exists(public_path() . $product3->image)) {
            File::delete(public_path() . $product3->image);
        }

        if ($product3->delete()) {
            return redirect()->route('product3.index')->with('message', "deleted successfully");
        }
        return redirect()->route('product3.index')->with('message', "unable to delete");
    }
}
