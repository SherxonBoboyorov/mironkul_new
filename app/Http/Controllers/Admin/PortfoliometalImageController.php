<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfoliometalImage;
use App\Http\Requests\Admin\UpdatePortfoliometalImage;
use App\Models\Portfoliometal;
use App\Models\PortfoliometalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfoliometalImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliometalimages = PortfoliometalImage::orderBy('id')->paginate(12);
        return view('admin.portfoliometalimage.index', [
            'portfoliometalimages' => $portfoliometalimages
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
        return view('admin.portfoliometalimage.create', [
            'portfoliometals' => $portfoliometals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfoliometalImage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfoliometalImage $request)
    {
        $data = $request->all();
        $data['image'] = PortfoliometalImage::uploadImage($request);

        if (PortfoliometalImage::create($data)) {
            return redirect()->route('portfoliometalimage.index')->with('message', "created seccessfully");
        }
        return redirect()->route('portfoliometalimage.index')->with('message', "unable to created");
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
    public function edit(PortfoliometalImage $portfoliometalimage)
    {
        $portfoliometal = Portfoliometal::all();
        return view('admin.portfoliometalimage.edit', [
            'portfoliometal' => $portfoliometal,
            'portfoliometalimage' => $portfoliometalimage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfoliometalImage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfoliometalImage $request, $id)
    {
        if (!PortfoliometalImage::find($id)) {
            return redirect()->route('portfoliometalimage.index')->with('message', "not fount");
        }

        $portfoliometalimage = PortfoliometalImage::find($id);

        $data = $request->all();
        $data['image'] = PortfoliometalImage::updateImage($request, $portfoliometalimage);

        if ($portfoliometalimage->update($data)) {
            return redirect()->route('portfoliometalimage.index')->with('message', "changed successfully");
        }
        return redirect()->route('portfoliometalimage.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PortfoliometalImage::find($id)) {
            return redirect()->route('portfoliometalimage.index')->with('message', "not found");
        }

        $portfoliometalimage = PortfoliometalImage::find($id);

        if (File::exists(public_path() . $portfoliometalimage->image)) {
            File::delete(public_path() . $portfoliometalimage->image);
        }

        if ($portfoliometalimage->delete()) {
            return redirect()->route('portfoliometalimage.index')->with('message', "deleted successfully");
        }
        return redirect()->route('portfoliometalimage.index')->with('message', "unable to delete ");
    }
}
