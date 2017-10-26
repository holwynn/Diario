<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\CreateEditor;
use App\Editor;

class EditorsController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create', Editor::class);

        $editor = $this->dispatchNow(new CreateEditor($request->all()));

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $editor['category_id']])
            ->with('message', 'Editor added successfully!');
    }

    public function destroy(Editor $editor)
    {
        $this->authorize('delete', Editor::class);

        $category_id = $editor->category_id;

        Editor::destroy($editor->id);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category_id])
            ->with('message', 'Editor removed successfully!');
    }
}
