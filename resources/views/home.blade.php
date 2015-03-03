@extends('app')

@section('content')

    <section id="why-larapress">

        <h1 class="text-center">Why LaraPress?</h1>

        <div class="row">
            <div class="columns small-12 large-4">
                <div class="panel callout radius">
                    <h5>This is a callout panel.</h5>

                    <p></p>
                    <p class="bottom">

                    </p>
                </div>
            </div>
            <div class="columns small-12 large-4">
                <div class="panel callout radius">
                    <h5>This is a callout panel.</h5>

                    <p></p>
                    <p class="bottom"></p>
                </div>
            </div>
            <div class="columns small-12 large-4">
                <div class="panel callout radius">
                    <h5>This is a callout panel.</h5>

                    <p></p>
                    <p class="bottom"></p>
                </div>
            </div>
        </div>

    </section>

    <section id="preview">
        <div class="preview-tabs">
            <ol class="">
                @foreach (\App\Feature::all() as $i => $feature)
                    <li class="{{ $i == 0 ? 'active' : '' }}"><a href="{{ $feature->permalink }}">{{ $feature->post_title }}</a></li>
                @endforeach
            </ol>
        </div>
        test
    </section>


@endsection
