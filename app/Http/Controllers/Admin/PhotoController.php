<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePage;
use App\Http\Requests\Admin\UpdatePage;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::oderBy('id')->paginate(12);
        return view('admin.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePage $request)
    {
        $data = $request->all();
        $data['image'] = Photo::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Photo::create($data)) {
            return redirect()->route('photo.index')->with('message', "Photo created seccessfully");
        }
        return redirect()->route('photo.index')->with('message', "unable to created Photo");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePage $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePage $request, $id)
    {
        if (!Photo::find($id)) {
            return redirect()->route('photo.index')->with('message', "Photo not fount");
        }

        $photo = Photo::find($id);

        $data = $request->all();
        $data['image'] = Photo::updateImage($request, $photo);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($photo->update($data)) {
            return redirect()->route('photo.index')->with('message', "Photo changed successfully");
        }
        return redirect()->route('photo.index')->with('message', "Unable to update Photo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Photo::find($id)) {
            return redirect()->route('photo.index')->with('message', "Photo not found");
        }

        $photo = Photo::find($id);

        if (File::exists(public_path() . $photo->image)) {
            File::delete(public_path() . $photo->image);
        }

        if ($photo->delete()) {
            return redirect()->route('photo.index')->with('message', "Photo deleted successfully");
        }
        return redirect()->route('photo.index')->with('message', "unable to delete Photo");
    }
}
