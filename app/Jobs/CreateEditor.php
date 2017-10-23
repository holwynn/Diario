<?php

namespace App\Jobs;

use App\Editor;
use App\Http\Requests\StoreEditorRequest;

class CreateEditor
{
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StoreEditorRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $editor = Editor::create([
            'user_id' => $this->request->user_id,
            'category_id' => $this->request->category_id,
        ]);

        return $editor;
    }
}
