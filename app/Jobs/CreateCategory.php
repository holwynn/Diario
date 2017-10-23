<?php

namespace App\Jobs;

use App\Http\Requests\StoreCategoryRequest;
use App\Category;

class CreateCategory
{
    private $request;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StoreCategoryRequest $request)
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
        $category = Category::create([
            'name' => $this->request->name,
        ]);

        return $category;
    }
}
