<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioImage;
use App\Http\Requests\Admin\UpdatePortfolioImage;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioimages = PortfolioImage::orderBy('id')->paginate(12);
        return view('admin.portfolioimage.index', [
            'portfolioimages' => $portfolioimages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolioimage.create', [
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioImage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioImage $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioImage::uploadImage($request);

        if (PortfolioImage::create($data)) {
            return redirect()->route('portfolioimage.index')->with('message', "Portfolio Image created seccessfully");
        }
        return redirect()->route('portfolioimage.index')->with('message', "unable to created Portfolio Image");
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
    public function edit(PortfolioImage $portfolioimage)
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolioimage.edit', [
            'portfolio' => $portfolio,
            'portfolioimage' => $portfolioimage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioImage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioImage $request, $id)
    {
        if (!PortfolioImage::find($id)) {
            return redirect()->route('portfolioimage.index')->with('message', "Portfolio Image not fount");
        }

        $portfolioimage = PortfolioImage::find($id);

        $data = $request->all();
        $data['image'] = PortfolioImage::updateImage($request, $portfolioimage);

        if ($portfolioimage->update($data)) {
            return redirect()->route('portfolioimage.index')->with('message', "Portfolio Image changed successfully");
        }
        return redirect()->route('portfolioimage.index')->with('message', "Unable to update Portfolio Image");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PortfolioImage::find($id)) {
            return redirect()->route('portfolioimage.index')->with('message', "Portfolio Image not found");
        }

        $portfolioimage = PortfolioImage::find($id);

        if (File::exists(public_path() . $portfolioimage->image)) {
            File::delete(public_path() . $portfolioimage->image);
        }

        if ($portfolioimage->delete()) {
            return redirect()->route('portfolioimage.index')->with('message', "Portfolio Image deleted successfully");
        }
        return redirect()->route('portfolioimage.index')->with('message', "unable to delete Portfolio Image ");
    }
}
