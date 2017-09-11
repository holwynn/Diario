<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor;

class EditorsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        Editor::create($data);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $data['category_id']])
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
