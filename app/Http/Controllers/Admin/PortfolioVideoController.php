<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioVideo;
use App\Http\Requests\Admin\UpdatePortfolioVideo;
use App\Models\Portfolio;
use App\Models\PortfolioVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliovideos = PortfolioVideo::orderBy('id')->paginate(10);
        return view('admin.portfoliovideo.index', [
            'portfoliovideos' => $portfoliovideos
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
        return view('admin.portfoliovideo.create', [
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioVideo $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioVideo::uploadImage($request);
        $data['video'] = PortfolioVideo::uploadVideo($request);

        if (PortfolioVideo::create($data)) {
            return redirect()->route('portfoliovideo.index')->with('message', "Portfolio Video created seccessfully");
        }
        return redirect()->route('portfoliovideo.index')->with('message', "unable to created Portfolio Video");
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
    public function edit(PortfolioVideo $portfoliovideo)
    {
        $portfolio = Portfolio::all();
        return view('admin.portfoliovideo.edit', [
            'portfolio' => $portfolio,
            'portfoliovideo' => $portfoliovideo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioVideo $request, $id)
    {
        if (!PortfolioVideo::find($id)) {
            return redirect()->route('portfoliovideo.index')->with('message', "Portfolio Video not fount");
        }

        $portfoliovideo = PortfolioVideo::find($id);

        $data = $request->all();
        $data['image'] = PortfolioVideo::updateImage($request, $portfoliovideo);
        $data['video'] = PortfolioVideo::updateVideo($request, $portfoliovideo);

        if ($portfoliovideo->update($data)) {
            return redirect()->route('portfoliovideo.index')->with('message', "Portfolio Video changed successfully");
        }
        return redirect()->route('portfoliovideo.index')->with('message', "Unable to update Portfolio Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliovideo = PortfolioVideo::find($id);

        if (File::exists(public_path() . $portfoliovideo->video)) {
            File::delete(public_path() . $portfoliovideo->video);
        }

        if ($portfoliovideo->delete()) {
            return redirect()->route('portfoliovideo.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('portfoliovideo.index')->with('message', "failed to delete successfully!!!");
    }
}
