@extends('layouts.main')

@section('content')

    <div class="row">

        <main class="columns small-12 large-8">
            @yield('content')
        </main>

        <aside class="columns small-12 large-4">
            Sidebar
        </aside>

    </div>

@overwrite