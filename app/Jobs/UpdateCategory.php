<?php

namespace App\Jobs;

use App\Http\Requests\UpdateCategoryRequest;
use App\Category;

class UpdateCategory
{
    private $category;
    private $name;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Category $category, $name)
    {
        $this->category = $category;
        $this->name = $name;
    }

    public static function fromRequest(UpdateCategoryRequest $request, Category $category)
    {
        return new static($category, $request->name);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->category->update([
            'name' => $this->name,
        ]);

        return $this->category;
    }
}
