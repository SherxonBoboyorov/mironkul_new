<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePresentation;
use App\Http\Requests\Admin\UpdatePresentation;
use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::orderBy('id')->paginate(12);
        return view('admin.presentation.index', compact('presentations'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.presentation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePresentation $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePresentation $request)
    {
        $data = $request->all();
        $data['file'] = Presentation::uploadImage($request);

        if (Presentation::create($data)) {
            return redirect()->route('presentation.index')->with('message', 'Presentation created successfully');
        }
        return redirect()->route('presentation.index')->with('message', 'unable to created Presentation');
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
        $presentation = Presentation::find($id);
        return view('admin.presentation.edit', compact('presentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePresentation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentation $request, $id)
    {
        if (!Presentation::find($id)) {
            return redirect()->route('presentation.index')->with('message', "Presentation not fount");
        }

        $presentation = Presentation::find($id);

        $data = $request->all();
        $data['file'] = Presentation::updateImage($request, $presentation);

        if ($presentation->update($data)) {
            return redirect()->route('presentation.index')->with('message', "Presentation changed successfully");
        }
        return redirect()->route('presentation.index')->with('message', "Unable to update Presentation");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Presentation::find($id)) {
            return redirect()->route('presentation.index')->with('message', "Presentation not found");
        }

        $presentation = Presentation::find($id);

        if (File::exists(public_path() . $presentation->file)) {
            File::delete(public_path() . $presentation->file);
        }

        if ($presentation->delete()) {
            return redirect()->route('presentation.index')->with('message', "Presentation deleted successfully");
        }
        return redirect()->route('presentation.index')->with('message', "unable to delete Presentation");
    }
}
