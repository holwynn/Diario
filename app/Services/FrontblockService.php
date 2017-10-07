<?php

namespace App\Services;

use Auth;
use App\Http\Requests\UpdateFrontblockRequest;
use App\Frontblock;

class FrontblockService
{
    public function update(UpdateFrontblockRequest $request, Frontblock $frontblock)
    {
        $frontblock->update([
            'name' => $request->name,
            'articles' => $request->articles
        ]);

        return $frontblock;
    }
}