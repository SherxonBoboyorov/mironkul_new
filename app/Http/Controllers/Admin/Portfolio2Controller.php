<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolio2;
use App\Http\Requests\Admin\UpdatePortfolio2;
use App\Models\Portfolio2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Portfolio2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio2s = Portfolio2::orderBy('id')->paginate(12);
        return view('admin.portfolio2.index', compact('portfolio2s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolio2  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolio2 $request)
    {
        $data = $request->all();
        $data['image'] = Portfolio2::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Portfolio2::create($data)) {
            return redirect()->route('portfolio2.index')->with('message', "Portfolio created seccessfully");
        }
        return redirect()->route('portfolio2.index')->with('message', "unable to created Portfolio");
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
        $portfolio2 = Portfolio2::find($id);
        return view('admin.portfolio2.edit', compact('portfolio2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolio2  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolio2 $request, $id)
    {
        if (!Portfolio2::find($id)) {
            return redirect()->route('portfolio2.index')->with('message', "Portfolio not fount");
        }

        $portfolio2 = Portfolio2::find($id);

        $data = $request->all();
        $data['image'] = Portfolio2::updateImage($request, $portfolio2);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($portfolio2->update($data)) {
            return redirect()->route('portfolio2.index')->with('message', "Portfolio changed successfully");
        }
        return redirect()->route('portfolio2.index')->with('message', "Unable to update Portfolio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Portfolio2::find($id)) {
            return redirect()->route('portfolio2.index')->with('message', "Portfolio not found");
        }

        $portfolio2 = Portfolio2::find($id);

        if (File::exists(public_path() . $portfolio2->image)) {
            File::delete(public_path() . $portfolio2->image);
        }

        if ($portfolio2->delete()) {
            return redirect()->route('portfolio2.index')->with('message', "Portfolio deleted successfully");
        }
        return redirect()->route('portfolio2.index')->with('message', "unable to delete Portfolio");
    }
}
