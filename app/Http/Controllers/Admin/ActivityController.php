<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\activity;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $themes = activity::latest()->get();
            return DataTables::of($themes)
                ->addIndexColumn()
                ->addColumn('btn', 'admin.activities.partials.btn')
                ->rawColumns(['btn'])
                ->make(true);
        }

        return view('admin.activities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activity = new Activity();
        return view('admin.activities.create', compact('activity'));
    }


    /**
     * Store a newly created resourceW in storage.
     */
    public function store(StoreRequest $request)
    {
        $activity = (new Activity)->fill($request->validated());
        $activity->save();
        return redirect()->route('activities.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(activity $activity)
    {
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Activity $activity)
    {
        $activity->fill($request->validated());
        $activity->save();
        return redirect()->route('activities.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('eliminar', 'ok');
    }
}
