<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\CreateCategory;
use App\Jobs\UpdateCategory;
use App\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCategory()
    {
        $job = new CreateCategory(['name' => 'Test category']);
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Test category', $category->name);

        return $category;
    }

    /**
     * @depends testCreateCategory
     */
    public function testUpdateCategory($category)
    {
        $job = new UpdateCategory($category, ['name' => 'New name']);
        $category = $job->handle();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New name', $category->name);
    }
}
