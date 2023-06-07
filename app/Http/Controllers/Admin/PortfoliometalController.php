<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfoliometal;
use App\Http\Requests\Admin\UpdatePortfoliometal;
use App\Models\Portfoliometal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfoliometalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliometals = Portfoliometal::orderBy('id')->paginate(10);
        return view('admin.portfoliometal.index', compact('portfoliometals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfoliometal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfoliometal  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfoliometal $request)
    {
        $data = $request->all();

        $data['image'] = Portfoliometal::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Portfoliometal::create($data)) {
            return redirect()->route('portfoliometal.index')->with('message', "created seccessfully");
        }
        return redirect()->route('portfoliometal.index')->with('message', "unable to created");
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
        $portfoliometal = Portfoliometal::find($id);
        return view('admin.portfoliometal.edit', compact('portfoliometal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfoliometal  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfoliometal $request, $id)
    {
        if (!Portfoliometal::find($id)) {
            return redirect()->route('portfoliometal.index')->with('message', "not fount");
        }

        $portfoliometal = Portfoliometal::find($id);

        $data = $request->all();
        $data['image'] = Portfoliometal::updateImage($request, $portfoliometal);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($portfoliometal->update($data)) {
            return redirect()->route('portfoliometal.index')->with('message', "changed successfully");
        }
        return redirect()->route('portfoliometal.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Portfoliometal::find($id)) {
            return redirect()->route('portfoliometal.index')->with('message', "not found");
        }

        $portfoliometal = Portfoliometal::find($id);

        if (File::exists(public_path() . $portfoliometal->image)) {
            File::delete(public_path() . $portfoliometal->image);
        }

        if ($portfoliometal->delete()) {
            return redirect()->route('portfoliometal.index')->with('message', "deleted successfully");
        }
        return redirect()->route('portfoliometal.index')->with('message', "unable to delete");
    }
}
