@extends('app')

@section('content')

    <section id="docs" class="row">

        <aside class="small-12 medium-3 columns">
            <nav id="docs-nav">

                {!! $docsMenuHTML !!}

            </nav>
        </aside>

        <main class="small-12 medium-9 columns docs-content">

            {!! $docHTML !!}

        </main>

    </section>


@endsection
