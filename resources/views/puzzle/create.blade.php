@extends('layouts.app')
<script src="{{ asset('js/app.js') }}" defer></script>


@section('content')
    <script>
    var game;
    function preload ()
    {
        this.load.setBaseURL('http://labs.phaser.io');

        this.load.image('sky', 'assets/skies/space3.png');
        this.load.image('logo', 'assets/sprites/phaser3-logo.png');
        this.load.image('red', 'assets/particles/red.png');
    }

    function create ()
    {

        this.add.grid(0,0, $("#width").val()*32, $("#height").val()*32, 32, 32, 0xff0000);
        const g1 = this.add.grid(100, 100, 128, 96, 32, 32, 0x057605);
        g1.setOrigin(0,0);

    }

    function reloadScene() {
        //Destory old phaser instance
        if(game) game.destroy(true);

           var config = {
        type: Phaser.AUTO,
        width: $("#phaser").width(),
        height: $("#phaser").height(),
        physics: {
            default: 'arcade',
            arcade: {
                gravity: { y: 200 }
            }
        },
        parent: 'phaser',

        scale: {
            _mode: Phaser.Scale.WIDTH_CONTROLS_HEIGHT,
            parent: 'phaser',
            width: $("#phaser").width(),
            height: $("#phaser").height(),
        },

        scene: {
            preload: preload,
            create: create
        }
    };

        game = new Phaser.Game(config);
        console.log($("#phaser").height())
    }
    $(document).ready(function(){
        reloadScene();
        $("#reloadButton").on('click', function() {
            reloadScene();
        });
    });
    </script>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="/crypto" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="name" class="form-label">{{ __('Size') }}</label>
                    <div class=" input-group mb-3">
                        <span class="input-group-text">Width</span>
                        <input id="width" step="any" type="number" class="form-control" placeholder="Amount of blocks" aria-label="Width">
                        <span class="input-group-text">Height</span>
                        <input id="height" step="any" type="number" class="form-control" placeholder="Amount of blocks" aria-label="Height">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <a href="#" id="reloadButton" class="btn btn-primary">Reload</a>
                    </div>
                    <label for="name" class="form-label">{{ __('Puzzle design') }}</label>
                        <div class="row">
                            <div class="col-3">
                            <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div id="phaser" class="col-9" style="min-height: 600"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
