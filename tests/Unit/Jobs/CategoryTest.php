<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Jobs\CreateCategory;
use App\Jobs\UpdateCategory;
use App\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCategory()
    {
        $job = new CreateCategory('Test category');
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Test category', $category->name);

        return $category;
    }
    
    public function testCreateCategoryFromRequest()
    {
        $request = StoreCategoryRequest::createFromGlobals();
        $request->name = 'Test request category';

        $job = CreateCategory::fromRequest($request);
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Test request category', $category->name);

        return $category;
    }

    /**
     * @depends testCreateCategory
     */
    public function testUpdateCategory($category)
    {
        $job = new UpdateCategory($category, 'New name');
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New name', $category->name);
    }

    /**
     * @depends testCreateCategoryFromRequest
     */
    public function testUpdateCategoryFromRequest($category)
    {
        $request = UpdateCategoryRequest::createFromGlobals();
        $request->name = 'New request name';

        $job = UpdateCategory::fromRequest($request, $category);
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New request name', $category->name);
    }
}
