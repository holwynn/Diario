<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\CreateFrontblock;
use App\Jobs\UpdateFrontblock;
use App\Frontblock;

class FrontblockTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateFrontblock()
    {
        $job = new CreateFrontblock([
            'name' => 'testfronblock',
            'articles' => '1,2,3,4,5',
            'rows' => '3',
            'columns' => '2'
        ]);
        $frontblock = $job->handle();

        $this->assertInstanceOf(Frontblock::class, $frontblock);
        $this->assertEquals('testfronblock', $frontblock->name);

        return $frontblock;
    }

    /**
     * @depends testCreateFrontblock
     */
    public function testUpdateFrontblock($frontblock)
    {
        $job = new UpdateFrontblock($frontblock, [
            'name' => 'newfrontblockname',
            'articles' => '5,4,3,2,1',
            'rows' => '3',
            'columns' => '2'
        ]);
        $frontblock = $job->handle();

        $this->assertInstanceOf(Frontblock::class, $frontblock);
        $this->assertEquals('newfrontblockname', $frontblock->name);
        $this->assertEquals('5,4,3,2,1', $frontblock->articles);
    }
}
