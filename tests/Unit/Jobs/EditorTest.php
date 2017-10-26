<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\StoreEditorRequest;
use App\Jobs\CreateEditor;
use App\Editor;
use App\Category;

class EditorTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateEditor()
    {
        $category = factory(Category::class)->create();
        $user = $this->createUser();

        $job = new CreateEditor([
            'user_id' => $user->id, 
            'category_id' => $category->id
        ]);

        $editor = $job->handle();

        $this->assertInstanceOf(Editor::class, $editor);
        $this->assertEquals($user->id, $editor->user_id);
        $this->assertEquals($category->id, $editor->category_id);
    }
}
