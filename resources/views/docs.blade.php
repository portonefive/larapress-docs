@extends('app')

@section('content')

    <section id="docs" class="row">

        <aside class="small-12 medium-3 columns">
            <nav id="docs-nav">

                {!! $docsMenuHTML !!}

            </nav>
        </aside>

        <main id="docs-content" class="small-12 medium-9 columns">

            {!! $docHTML !!}

        </main>

    </section>


@endsection
