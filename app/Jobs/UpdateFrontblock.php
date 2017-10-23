<?php

namespace App\Jobs;

use App\Http\Requests\UpdateFrontblockRequest;
use App\Frontblock;

class UpdateFrontblock
{
    private $frontblock;
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Frontblock $frontblock, UpdateFrontblockRequest $request)
    {
        $this->frontblock = $frontblock;
        $this->request = $request;   
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->frontblock->update([
            'name' => $this->request->name,
            'articles' => $this->request->articles,
            'rows' => $this->request->rows,
            'columns' => $this->request->columns
        ]);

        return $this->frontblock;
    }
}
