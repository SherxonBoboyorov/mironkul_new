<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioImage2;
use App\Http\Requests\Admin\UpdatePortfolioImage2;
use App\Models\Portfolio2;
use App\Models\PortfolioImage2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioImage2Controller extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioimage2s = PortfolioImage2::orderBy('id')->paginate(12);
        return view('admin.portfolioimage2.index', [
            'portfolioimage2s' => $portfolioimage2s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio2s = Portfolio2::all();
        return view('admin.portfolioimage2.create', [
            'portfolio2s' => $portfolio2s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioImage2 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioImage2 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioImage2::uploadImage($request);

        if (PortfolioImage2::create($data)) {
            return redirect()->route('portfolioimage2.index')->with('message', "Portfolio Image created seccessfully");
        }
        return redirect()->route('portfolioimage2.index')->with('message', "unable to created Portfolio Image");
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
    public function edit(PortfolioImage2 $portfolioimage2)
    {
        $portfolio2 = Portfolio2::all();
        return view('admin.portfolioimage2.edit', [
            'portfolio2' => $portfolio2,
            'portfolioimage2' => $portfolioimage2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioImage1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioImage2 $request, $id)
    {
        if (!PortfolioImage2::find($id)) {
            return redirect()->route('portfolioimage2.index')->with('message', "Portfolio Image not fount");
        }

        $portfolioimage2 = PortfolioImage2::find($id);

        $data = $request->all();
        $data['image'] = PortfolioImage2::updateImage($request, $portfolioimage2);

        if ($portfolioimage2->update($data)) {
            return redirect()->route('portfolioimage2.index')->with('message', "Portfolio Image changed successfully");
        }
        return redirect()->route('portfolioimage2.index')->with('message', "Unable to update Portfolio Image");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PortfolioImage2::find($id)) {
            return redirect()->route('portfolioimage2.index')->with('message', "Portfolio Image not found");
        }

        $portfolioimage2 = PortfolioImage2::find($id);

        if (File::exists(public_path() . $portfolioimage2->image)) {
            File::delete(public_path() . $portfolioimage2->image);
        }

        if ($portfolioimage2->delete()) {
            return redirect()->route('portfolioimage2.index')->with('message', "Portfolio Image deleted successfully");
        }
        return redirect()->route('portfolioimage2.index')->with('message', "unable to delete Portfolio Image ");
    }
}
