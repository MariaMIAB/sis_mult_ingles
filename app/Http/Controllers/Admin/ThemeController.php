<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Theme\StoreRequest;
use App\Http\Requests\Theme\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $themes = Theme::latest()->get();
            return DataTables::of($themes)
                ->addIndexColumn()
                ->addColumn('btn', 'admin.themes.partials.btn')
                ->rawColumns(['btn'])
                ->make(true);
        }

        return view('admin.themes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = new Theme();
        return view('admin.themes.create', compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Theme $theme)
    {
        $theme = (new Theme)->fill($request->validated());

        if ($request->hasFile('theme_image')) {
            $theme->theme_image = $request->file('theme_image')->store('public/imagenes/temas/');
        }
        $theme->save();
        return redirect()->route('themes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Theme $theme)
    {
        $theme = Theme::with('content')->find($theme->id);
        return view('admin.themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Theme $theme)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('theme_image')) {
            if ($theme->theme_image) {
                Storage::delete($theme->theme_image);
            }
            $theme->theme_image = $request->file('theme_image')->store('public/imagenes/temas/');
        }
        $validatedData = Arr::except($validatedData, ['theme_image']);
        $theme->update($validatedData);
        return redirect()->route('themes.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index')->with('eliminar', 'ok');
    }
}
