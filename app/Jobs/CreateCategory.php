<?php

namespace App\Jobs;

use Validator;
use App\Category;

class CreateCategory
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
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name'
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Validator::make($this->attributes, $this->rules())->validate();
        
        $category = new Category($this->attributes);
        $category->save();

        return $category;
    }
}
