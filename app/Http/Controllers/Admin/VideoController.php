<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateVideo;
use App\Http\Requests\Admin\UpdateVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id')->paginate(12);
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVideo $request)
    {
        $data = $request->all();

        $data['image'] = Video::uploadImage($request);
        $data['video'] = Video::uploadVideo($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Video::create($data)) {
            return redirect()->route('video.index')->with('message', "Video created seccessfully");
        }
        return redirect()->route('video.index')->with('message', "unable to created Video");
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
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideo $request, $id)
    {
        if (!Video::find($id)) {
            return redirect()->route('video.index')->with('message', "Video not fount");
        }

        $video = Video::find($id);

        $data = $request->all();

        $data['image'] = Video::updateImage($request, $video);

        $data['video'] = Video::updateVideo($request, $video);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');
        
        if ($video->update($data)) {
            return redirect()->route('video.index')->with('message', "Video changed successfully");
        }
        return redirect()->route('video.index')->with('message', "Unable to update Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        if (File::exists(public_path() . $video->video)) {
            File::delete(public_path() . $video->video);
        }

        if ($video->delete()) {
            return redirect()->route('video.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('video.index')->with('message', "failed to delete successfully!!!");
    }
}
