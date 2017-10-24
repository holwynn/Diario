<?php

namespace App\Jobs;

use App\Editor;
use App\Http\Requests\StoreEditorRequest;

class CreateEditor
{
    private $user_id;
    private $category_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $category_id)
    {
        $this->user_id = $user_id;
        $this->category_id = $category_id;
    }

    public static function fromRequest(StoreEditorRequest $request)
    {
        return new static($request->user_id, $request->category_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $editor = new Editor([
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ]);
        $editor->save();

        return $editor;
    }
}
