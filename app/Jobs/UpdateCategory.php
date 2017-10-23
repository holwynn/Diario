<?php

namespace App\Jobs;

use App\Http\Requests\UpdateCategoryRequest;
use App\Category;

class UpdateCategory
{
    private $category;
    private $request;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Category $category, UpdateCategoryRequest $request)
    {
        $this->category = $category;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->category->update([
            'name' => $this->request->name,
        ]);

        return $this->category;
    }
}
