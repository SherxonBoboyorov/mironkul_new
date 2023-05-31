<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryType;
use App\Http\Requests\Admin\UpdateCategoryType;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorytypes = CategoryType::orderBy('created_at', 'DESC')->get();
        return view('admin.categorytype.index', [
            'categorytypes' => $categorytypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categorytype.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCategoryType $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryType $request)
    {
        $data = $request->all();
        $data['image'] = CategoryType::uploadImage($request);

        if (CategoryType::create($data)) {
            return redirect()->route('categorytype.index')->with('message', "created seccessfully");
        }
        return redirect()->route('categorytype.index')->with('message', "unable to created");
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
    public function edit(CategoryType $categorytype)
    {
        $category = Category::all();
        return view('admin.categorytype.edit', [
            'category' => $category,
            'categorytype' => $categorytype
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCategoryType  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryType $request, $id)
    {
        if (!CategoryType::find($id)) {
            return redirect()->route('categorytype.index')->with('message', "not fount");
        }

        $categorytype = CategoryType::find($id);

        $data = $request->all();
        $data['image'] = CategoryType::updateImage($request, $categorytype);

        if ($categorytype->update($data)) {
            return redirect()->route('categorytype.index')->with('message', "changed successfully");
        }
        return redirect()->route('categorytype.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!CategoryType::find($id)) {
            return redirect()->route('categorytype.index')->with('message', "not found");
        }

        $categorytype = CategoryType::find($id);

        if (File::exists(public_path() . $categorytype->image)) {
            File::delete(public_path() . $categorytype->image);
        }

        if ($categorytype->delete()) {
            return redirect()->route('categorytype.index')->with('message', "deleted successfully");
        }
        return redirect()->route('categorytype.index')->with('message', "unable to delete");
    }
}
