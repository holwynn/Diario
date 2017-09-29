<?php

namespace App\Services;

use Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;

class CategoryService
{

    public function create(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        return $category;
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return $category;
    }
}