<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\StoreRequest;
use App\Http\Requests\Content\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;
use App\Models\Theme;

class ContentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($themeId)
    {
        $theme = Theme::find($themeId);
        $content = new Content();
        return view('admin.contents.create', compact('content', 'themeId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $content = (new Content())->fill($request->validated());

        if ($request->hasFile('content_image')) {
            $content->content_image = $request->file('content_image')->store('public/imagenes/temas/');
        }
        $content->save();
        return redirect()->route('themes.show', ['theme' => $content->theme_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('admin.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Content $content)
    {
        $content->fill($request->validated());

        if ($request->hasFile('content_image')) {
            // Eliminar la imagen anterior si existe
            Storage::delete($content->content_image);

            // Almacenar la nueva imagen
            $content->content_image = $request->file('content_image')->store('public/imagenes/temas/');
        }

        $content->save();

        return redirect()->route('themes.show', ['theme' => $content->theme_id]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $themeId = $content->theme_id;
        $content->delete();
        return redirect()->route('themes.show', ['theme' => $themeId])->with('eliminar', 'ok');
    }
}
