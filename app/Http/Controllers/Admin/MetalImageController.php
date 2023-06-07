<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateMetalImage;
use App\Http\Requests\Admin\UpdateMetalImage;
use App\Models\Metal;
use App\Models\MetalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MetalImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metalimages = MetalImage::orderBy('id')->paginate(12);
        return view('admin.metalimage.index', [
            'metalimages' => $metalimages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metals = Metal::all();
        return view('admin.metalimage.create', [
            'metals' => $metals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateMetalImage $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMetalImage $request)
    {
        $data = $request->all();
        $data['image'] = MetalImage::uploadImage($request);

        if (MetalImage::create($data)) {
            return redirect()->route('metalimage.index')->with('message', "created seccessfully");
        }
        return redirect()->route('metalimage.index')->with('message', "unable to created");
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
    public function edit(MetalImage $metalimage)
    {
        $metal = Metal::all();
        return view('admin.metalimage.edit', [
            'metal' => $metal,
            'metalimage' => $metalimage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateMetalImage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMetalImage $request, $id)
    {
        if (!MetalImage::find($id)) {
            return redirect()->route('metalimage.index')->with('message', "not fount");
        }

        $metalimage = MetalImage::find($id);

        $data = $request->all();
        $data['image'] = MetalImage::updateImage($request, $metalimage);

        if ($metalimage->update($data)) {
            return redirect()->route('metalimage.index')->with('message', "changed successfully");
        }
        return redirect()->route('metalimage.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!MetalImage::find($id)) {
            return redirect()->route('metalimage.index')->with('message', "not found");
        }

        $metalimage = MetalImage::find($id);

        if (File::exists(public_path() . $metalimage->image)) {
            File::delete(public_path() . $metalimage->image);
        }

        if ($metalimage->delete()) {
            return redirect()->route('metalimage.index')->with('message', "deleted successfully");
        }
        return redirect()->route('metalimage.index')->with('message', "unable to delete");
    }
}
