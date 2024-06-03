<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Inertia\Inertia;

class GameController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/games/index', [
            'games' => Game::select('id', 'name')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return Inertia::render('admin/games/show', [
            'id' => $game->id,
            'name' => $game->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return Inertia::render('admin/games/edit', [
            'id' => $game->id,
            'name' => $game->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->validated());

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
