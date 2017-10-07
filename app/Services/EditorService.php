<?php

namespace App\Services;

use App\Http\Requests\StoreEditorRequest;
use App\Editor;

class EditorService
{
    public function create(StoreEditorRequest $request)
    {
        $editor = Editor::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return $editor;
    }
}