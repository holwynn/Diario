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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list', Category::class);

        $categories = Category::all();

        return view('dashboard.categories.list', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $category = CategoryService::store($request);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category created sucessfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update', Category::class);

        $editors = User::where('roles', 'LIKE', '%ROLE_EDITOR%')
            ->get();

        return view('dashboard.categories.edit', [
            'category' => $category,
            'editors' => $editors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update', Category::class);

        CategoryService::update($request, $category);

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        $this->authorize('delete', Category::class);

        $category->delete();

        return redirect()
            ->action('Dashboard\CategoriesController@edit', ['category' => $category->id])
            ->with('message', 'Category deleted sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('destroy', Category::class);

        $category->forceDelete();

        return redirect()
            ->action('Dashboard\CategoriesController@index')
            ->with('message', 'Category destroyed sucessfully!');
    }
}
