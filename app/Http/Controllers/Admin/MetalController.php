<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateMetal;
use App\Http\Requests\Admin\UpdateMetal;
use App\Models\Metal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MetalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metals = Metal::orderBy('id')->paginate(12);
        return view('admin.metal.index', compact('metals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateMetal  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMetal $request)
    {
        $data = $request->all();
        $data['image'] = Metal::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Metal::create($data)) {
            return redirect()->route('metal.index')->with('message', "Created seccessfully");
        }
        return redirect()->route('metal.index')->with('message', "unable to created");
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
        $metal = Metal::find($id);
        return view('admin.metal.edit', compact('metal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateMetal  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMetal $request, $id)
    {
        if (!Metal::find($id)) {
            return redirect()->route('metal.index')->with('message', "not fount");
        }

        $metal = Metal::find($id);

        $data = $request->all();
        $data['image'] = Metal::updateImage($request, $metal);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($metal->update($data)) {
            return redirect()->route('metal.index')->with('message', "changed successfully");
        }
        return redirect()->route('metal.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Metal::find($id)) {
            return redirect()->route('metal.index')->with('message', "not found");
        }

        $metal = Metal::find($id);

        if (File::exists(public_path() . $metal->image)) {
            File::delete(public_path() . $metal->image);
        }

        if ($metal->delete()) {
            return redirect()->route('metal.index')->with('message', "deleted successfully");
        }
        return redirect()->route('metal.index')->with('message', "unable to delete");
    }
}
