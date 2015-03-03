@extends('app')

@section('content')

    <section id="why-larapress">

        <h1 class="text-center">Why LaraPress?</h1>

        <ol class="row">
            <li class="columns small-12 large-4">
                <div class="panel radius">
                    <i class="foundicon-monitor large"></i>
                    <h4>Powerful</h4>
                    <p>Curabitur pulvinar quis magna sed pharetra nibh finibus turpis.</p>
                    <a href="#">See it in action</a>
                </div>
            </li>
            <li class="columns small-12 large-4">
                <div class="panel radius">
                    <i class="foundicon-tools large"></i>
                    <h4>Elegant</h4>
                    <p>Sed bibendum, felis accumsan scelerisque tincidunt, tellus nibh.</p>
                    <a href="#">Learn more</a>
                </div>
            </li>
            <li class="columns small-12 large-4">
                <div class="panel radius">
                    <i class="foundicon-trash large"></i>
                    <h4>Simple</h4>
                    <p>Nulla volutpat rutrum enim, ut efficitur ipsum lobortis nec nisi.</p>
                    <a href="#">See how it works</a>
                </div>
            </li>
        </ol>

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
