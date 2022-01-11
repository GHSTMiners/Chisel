<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $skills = request()->selectedWorld->skills;
        return view('backend.skill.index', compact('skills'));
    }

    public function create() {
        return view('backend.skill.create');
    }

    public function destroy(Skill $skill) {
        $skill->delete();
        return redirect()->route('skill.index');
    } 

    public function edit(Skill $skill) {
        return view('backend.skill.edit', compact('skill'));
    }

    public function update(Skill $skill) {
        $data = request()->validate([
            'name' => ['string'],
            'description' => ['string'],
            'minimum' => ['string'],
            'maximum' => ['string'],
            'initial' => ['string']
        ]);

        $skill->update($data);
        return redirect()->route('skill.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'minimum' => ['string', 'required'],
            'maximum' => ['string', 'required'],
            'initial' => ['string', 'required']
        ]);

        $data['world_id'] = $model->id;
        \App\Models\Skill::create($data);
        return redirect()->route('skill.index');

    }
}
