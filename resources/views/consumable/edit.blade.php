@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-consumable-tab" data-bs-toggle="tab" data-bs-target="#nav-consumable" type="button" role="tab" aria-controls="nav-consumable" aria-selected="true">Consumable</button>
                            <button class="nav-link" id="nav-vitals-tab" data-bs-toggle="tab" data-bs-target="#nav-vitals" type="button" role="tab" aria-controls="nav-vitals" aria-selected="false">Vital effects</button>
                            <button class="nav-link" id="nav-skills-tab" data-bs-toggle="tab" data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-skills" aria-selected="false">Skill effects</button>
                        </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-consumable" role="tabpanel" aria-labelledby="nav-consumable-tab">
                            @include('consumable.editTabs.edit')
                        </div>
                        <div class="tab-pane fade" id="nav-vitals" role="tabpanel" aria-labelledby="nav-vitals-tab">
                            @include('consumable.editTabs.vitalEffect.index')
                        </div>
                        <div class="tab-pane fade" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab">
                            @include('consumable.editTabs.skillEffect.index')
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


