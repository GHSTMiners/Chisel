<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Vital;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class VitalController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;
        return view('backend.vital.index', compact('vitals'));
    }

    public function edit(Vital $vital) {
        return view('backend.vital.edit', compact('vital'));
    }
    
    public function create() {
        return view('backend.vital.create');
    }

    public function destroy(Vital $vital) {
        if(!$vital->default) $vital->delete();
        return redirect()->route('vital.index');
    }  

    public function update(Vital $vital) {
        $data = request()->validate([
            'name' => ['string'],
            'minimum' => ['string'],
            'maximum' => ['string'],
            'initial' => ['string']
        ]);

        $vital->update($data);
        return redirect()->route('vital.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['string', 'required'],
            'minimum' => ['required', 'string'],
            'maximum' => ['required', 'string'],
            'initial' => ['required', 'string']
        ]);
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;
        \App\Models\Vital::create($data);
        return redirect()->route('vital.index');

    }
}
