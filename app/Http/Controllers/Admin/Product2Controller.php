<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Product2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products2 = Product2::orderBy('id')->paginate(12);
        return view('admin.product2.index', compact('products2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = Product2::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Product2::create($data)) {
            return redirect()->route('product2.index')->with('message', "created seccessfully");
        }
        return redirect()->route('product2.index')->with('message', "unable to created");
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
        $product2 = Product2::find($id);
        return view('admin.product2.edit', compact('product2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Product1::find($id)) {
            return redirect()->route('product1.index')->with('message', "not fount");
        }

        $product1 = Product1::find($id);

        $data = $request->all();
        $data['image'] = Product1::updateImage($request, $product1);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($product1->update($data)) {
            return redirect()->route('product1.index')->with('message', "changed successfully");
        }
        return redirect()->route('product1.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Product1::find($id)) {
            return redirect()->route('product1.index')->with('message', "not found");
        }

        $product1 = Product1::find($id);

        if (File::exists(public_path() . $product1->image)) {
            File::delete(public_path() . $product1->image);
        }

        if ($product1->delete()) {
            return redirect()->route('product1.index')->with('message', "deleted successfully");
        }
        return redirect()->route('product1.index')->with('message', "unable to delete");
    }
}
