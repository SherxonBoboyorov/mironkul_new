<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOffice;
use App\Http\Requests\Admin\UpdateOffice;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('id')->get();
        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateOffice  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOffice $request)
    {
        $data = $request->all();

        if (Office::create($data)) {
            return redirect()->route('office.index')->with('message', 'Created successfully');
        }
        return redirect()->route('office.index')->back()->with('message', 'Error creating');
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
        $office = Office::find($id);
        return view('admin.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateOffice  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffice $request, $id)
    {
        $office = Office::find($id);

        $data = $request->all();

        if ($office->update($data)) {
            return redirect()->route('office.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('office.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Office::find($id)) {
            return redirect()->route('office.index')->with('message', "not found");
        }

        $office = Office::find($id);

        if ($office->delete()) {
            return redirect()->route('office.index')->with('message', "deleted successfully");
        }
        return redirect()->route('office.index')->with('message', "unable to delete");
    }
}
