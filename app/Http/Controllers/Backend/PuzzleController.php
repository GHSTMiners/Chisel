<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Puzzle;
use App\Models\PuzzleBlock;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class PuzzleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $puzzles = Puzzle::all();
        return view('backend.puzzle.index', compact('puzzles'));
    }


    public function destroy(Puzzle $puzzle) {
        $puzzle->delete();
        return redirect()->route('puzzle.index');
    }

    public function create() {
        $soil = $this->worldRepository->getSelectedWorld()->soil;

        $rocks = $this->worldRepository->getSelectedWorld()->rocks;
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $consumables = $this->worldRepository->getSelectedWorld()->consumables;
        $explosives = $this->worldRepository->getSelectedWorld()->explosives;

        return view('backend.puzzle.create', compact('soil', 'rocks', 'crypto', 'consumables', 'explosives'));
    }

    public function edit(Puzzle $puzzle) {
        $soil = $this->worldRepository->getSelectedWorld()->soil;

        $rocks = $this->worldRepository->getSelectedWorld()->rocks;
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $consumables = $this->worldRepository->getSelectedWorld()->consumables;
        $explosives = $this->worldRepository->getSelectedWorld()->explosives;

        return view('backend.puzzle.edit', compact('puzzle', 'soil', 'rocks', 'crypto', 'consumables', 'explosives'));
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'blocks' => ['required', 'array'],
        ]);

        $puzzle = Puzzle::create([
            'name' => $data['name'],
            'world_id' => $this->worldRepository->getSelectedWorld()->id,
        ]);

        for ($y=0; $y < count($data['blocks']); $y++) { 
            $row = $data['blocks'][$y];
            for ($x=0; $x < count($row); $x++) { 
                $block = $row[$x];
                $puzzle_block = new \App\Models\PuzzleBlock([
                    'x' => $x,
                    'y' => $y,
                    'spawn_type' => $block['spawn_type'],
                    'spawn_id' => $block['spawn_id'],
                    'soil_id' => $block['soil_id']
                ]);
                $puzzle->blocks()->save($puzzle_block);
            }
        }

        
        return redirect()->route('puzzle.index');
    }
}
