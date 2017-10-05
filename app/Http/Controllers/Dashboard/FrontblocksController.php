<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFrontblockRequest;
use App\Services\FrontblockService;
use App\Frontblock;

class FrontblocksController extends Controller
{
    private $frontblockService;

    public function __construct(FrontblockService $frontblockService)
    {
        $this->frontblockService = $frontblockService;
    }

    public function index()
    {
        return view('dashboard.frontblocks.list', [
            'frontblocks' => Frontblock::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Frontblock $frontblock)
    {
        //
    }

    public function edit(Frontblock $frontblock)
    {
        $this->authorize('update', $frontblock);

        return view('dashboard.frontblocks.edit', [
            'frontblock' => $frontblock
        ]);
    }

    public function update(UpdateFrontblockRequest $request, Frontblock $frontblock)
    {
        $this->authorize('update', $frontblock);

        $this->frontblockService->update($request, $frontblock);

        return redirect()
            ->action('Dashboard\FrontblocksController@edit', ['frontblock' => $frontblock->id])
            ->with('message', 'Frontblock updated sucessfully!');
    }
    
    public function destroy(Frontblock $frontblock)
    {
        //
    }
}
