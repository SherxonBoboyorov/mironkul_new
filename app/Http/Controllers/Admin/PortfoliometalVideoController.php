<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfoliometalVideo;
use App\Http\Requests\Admin\UpdatePortfoliometalVideo;
use App\Models\Portfoliometal;
use App\Models\PortfoliometalVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfoliometalVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliometalvideos = PortfoliometalVideo::orderBy('id')->paginate(10);
        return view('admin.portfoliometalvideo.index', [
            'portfoliometalvideos' => $portfoliometalvideos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfoliometals = Portfoliometal::all();
        return view('admin.portfoliometalvideo.create', [
            'portfoliometals' => $portfoliometals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfoliometalVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfoliometalVideo $request)
    {
        $data = $request->all();
        $data['image'] = PortfoliometalVideo::uploadImage($request);
        $data['video'] = PortfoliometalVideo::uploadVideo($request);

        if (PortfoliometalVideo::create($data)) {
            return redirect()->route('portfoliometalvideo.index')->with('message', " created seccessfully");
        }
        return redirect()->route('portfoliometalvideo.index')->with('message', "unable to created");
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
    public function edit(PortfoliometalVideo $portfoliometalvideo)
    {
        $portfoliometal = Portfoliometal::all();
        return view('admin.portfoliometalvideo.edit', [
            'portfoliometal' => $portfoliometal,
            'portfoliometalvideo' => $portfoliometalvideo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfoliometalVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfoliometalVideo $request, $id)
    {
        if (!PortfoliometalVideo::find($id)) {
            return redirect()->route('portfoliometalvideo.index')->with('message', "not fount");
        }

        $portfoliometalvideo = PortfoliometalVideo::find($id);

        $data = $request->all();
        $data['image'] = PortfoliometalVideo::updateImage($request, $portfoliometalvideo);
        $data['video'] = PortfoliometalVideo::updateVideo($request, $portfoliometalvideo);

        if ($portfoliometalvideo->update($data)) {
            return redirect()->route('portfoliometalvideo.index')->with('message', "changed successfully");
        }
        return redirect()->route('portfoliometalvideo.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliometalvideo = PortfoliometalVideo::find($id);

        if (File::exists(public_path() . $portfoliometalvideo->video)) {
            File::delete(public_path() . $portfoliometalvideo->video);
        }

        if ($portfoliometalvideo->delete()) {
            return redirect()->route('portfoliometalvideo.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('portfoliometalvideo.index')->with('message', "failed to delete successfully!!!");
    }
}
