<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EditorService;
use App\Http\Requests\StoreEditorRequest;
use App\Editor;

class EditorsController extends Controller
{
    private $editorService;

    public function __construct(EditorService $editorService)
    {
        $this->editorService = $editorService;
    }

    public function store(StoreEditorRequest $request)
    {
        $this->authorize('create', Editor::class);

        $editor = $this->editorService->create($request);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $editor['category_id']])
            ->with('message', 'Editor added successfully!');
    }

    public function destroy(Editor $editor)
    {
        $this->authorize('destroy', Editor::class);

        $category_id = $editor->category_id;

        Editor::destroy($editor->id);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category_id])
            ->with('message', 'Editor removed successfully!');
    }
}
