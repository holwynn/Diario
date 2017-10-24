<?php

namespace App\Jobs;

use App\Http\Requests\StoreCategoryRequest;
use App\Category;

class CreateCategory
{
    private $name;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function fromRequest(StoreCategoryRequest $request)
    {
        return new static($request->name);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $category = new Category([
            'name' => $this->name,
        ]);
        $category->save();

        return $category;
    }
}
