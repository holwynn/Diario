<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EditorService;
use App\Http\Requests\StoreEditorRequest;
use App\Editor;

class EditorsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditorRequest $request)
    {
        $editor = EditorService::store($request);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $editor['category_id']])
            ->with('message', 'Editor added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        $category_id = $editor->category_id;

        Editor::destroy($editor->id);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category_id])
            ->with('message', 'Editor removed successfully!');
    }
}
