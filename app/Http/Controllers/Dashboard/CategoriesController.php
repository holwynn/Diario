<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Category;
use App\User;

class CategoriesController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $this->authorize('list', Category::class);

        $categories = Category::all();

        return view('dashboard.categories.list', [
            'categories' => $categories
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $category = $this->categoryService->create($request);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category created sucessfully!');
    }

    public function edit(Category $category)
    {
        $this->authorize('view', $category);

        $editors = User::where('roles', 'LIKE', '%ROLE_EDITOR%')
            ->get();

        return view('dashboard.categories.edit', [
            'category' => $category,
            'editors' => $editors
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update', Category::class);

        $this->categoryService->update($request, $category);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category updated sucessfully!');
    }

    public function delete(Category $category)
    {
        $this->authorize('delete', Category::class);

        $category->delete();

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category deleted sucessfully!');
    }

    public function destroy(Category $category)
    {
        $this->authorize('destroy', Category::class);

        $category->forceDelete();

        return redirect()
            ->action('Dashboard\CategoriesController@index')
            ->with('message', 'Category destroyed sucessfully!');
    }
}
