<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioVideo2;
use App\Http\Requests\Admin\UpdatePortfolioVideo2;
use App\Models\Portfolio2;
use App\Models\PortfolioVideo2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioVideo2Controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliovideo2s = PortfolioVideo2::orderBy('id')->paginate(10);
        return view('admin.portfoliovideo2.index', [
            'portfoliovideo2s' => $portfoliovideo2s
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
        return view('admin.portfoliovideo2.create', [
            'portfolio2s' => $portfolio2s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioVideo2 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioVideo2 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioVideo2::uploadImage($request);
        $data['video'] = PortfolioVideo2::uploadVideo($request);

        if (PortfolioVideo2::create($data)) {
            return redirect()->route('portfoliovideo2.index')->with('message', "Portfolio Video created seccessfully");
        }
        return redirect()->route('portfoliovideo2.index')->with('message', "unable to created Portfolio Video");
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
    public function edit(PortfolioVideo2 $portfoliovideo2)
    {
        $portfolio2 = Portfolio2::all();
        return view('admin.portfoliovideo2.edit', [
            'portfolio2' => $portfolio2,
            'portfoliovideo2' => $portfoliovideo2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioVideo2  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioVideo2 $request, $id)
    {
        if (!PortfolioVideo2::find($id)) {
            return redirect()->route('portfoliovideo2.index')->with('message', "Portfolio Video not fount");
        }

        $portfoliovideo2 = PortfolioVideo2::find($id);

        $data = $request->all();
        $data['image'] = PortfolioVideo2::updateImage($request, $portfoliovideo2);
        $data['video'] = PortfolioVideo2::updateVideo($request, $portfoliovideo2);

        if ($portfoliovideo2->update($data)) {
            return redirect()->route('portfoliovideo2.index')->with('message', "Portfolio Video changed successfully");
        }
        return redirect()->route('portfoliovideo2.index')->with('message', "Unable to update Portfolio Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliovideo2 = PortfolioVideo2::find($id);

        if (File::exists(public_path() . $portfoliovideo2->video)) {
            File::delete(public_path() . $portfoliovideo2->video);
        }

        if ($portfoliovideo2->delete()) {
            return redirect()->route('portfoliovideo2.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('portfoliovideo2.index')->with('message', "failed to delete successfully!!!");
    }
}
