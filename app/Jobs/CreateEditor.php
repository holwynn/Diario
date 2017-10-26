<?php

namespace App\Jobs;

use Validator;
use App\Editor;

class CreateEditor
{
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;

        Validator::make($this->attributes, $this->rules())->validate();
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $editor = new Editor($this->attributes);
        $editor->save();

        return $editor;
    }
}
