<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateMetalVideo;
use App\Http\Requests\Admin\UpdateMetalVideo;
use App\Models\Metal;
use App\Models\MetalVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MetalVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metalvideos = MetalVideo::orderBy('id')->paginate(10);
        return view('admin.metalvideo.index', [
            'metalvideos' => $metalvideos
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
        return view('admin.metalvideo.create', [
            'metals' => $metals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateMetalVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMetalVideo $request)
    {
        $data = $request->all();
        $data['image'] = MetalVideo::uploadImage($request);
        $data['video'] = MetalVideo::uploadVideo($request);

        if (MetalVideo::create($data)) {
            return redirect()->route('metalvideo.index')->with('message', "created seccessfully");
        }
        return redirect()->route('metalvideo.index')->with('message', "unable to created");
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
    public function edit(MetalVideo $metalvideo)
    {
        $metal = Metal::all();
        return view('admin.metalvideo.edit', [
            'metal' => $metal,
            'metalvideo' => $metalvideo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateMetalVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMetalVideo $request, $id)
    {
        if (!MetalVideo::find($id)) {
            return redirect()->route('metalvideo.index')->with('message', "not fount");
        }

        $metalvideo = MetalVideo::find($id);

        $data = $request->all();
        $data['image'] = MetalVideo::updateImage($request, $metalvideo);
        $data['video'] = MetalVideo::updateVideo($request, $metalvideo);

        if ($metalvideo->update($data)) {
            return redirect()->route('metalvideo.index')->with('message', "changed successfully");
        }
        return redirect()->route('metalvideo.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metalvideo = MetalVideo::find($id);

        if (File::exists(public_path() . $metalvideo->video)) {
            File::delete(public_path() . $metalvideo->video);
        }

        if ($metalvideo->delete()) {
            return redirect()->route('metalvideo.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('metalvideo.index')->with('message', "failed to delete successfully!!!");
    }
}
