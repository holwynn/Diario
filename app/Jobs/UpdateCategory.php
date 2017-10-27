<?php

namespace App\Jobs;

use Validator;
use App\Category;

class UpdateCategory
{
    private $category;
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Category $category, $attributes = [])
    {
        $this->category = $category;
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
        
        $this->category->update($this->attributes);

        return $this->category;
    }
}
