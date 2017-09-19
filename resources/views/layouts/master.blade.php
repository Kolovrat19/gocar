@extends('layouts.app')

@section('main')
    <div class="columns">
        @include('_includes.nav.main')


        <div class="column is-10 admin-panel">
            <nav class="nav has-shadow" id="top">
                <div class="container">
                    <div class="nav-left">
                        <a class="nav-item" href="../index.html">
                            <img src="{{ asset('images/bulma.png') }}" alt="Description">
                        </a>
                    </div>
          <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
          </span>
                    <div class="nav-right nav-menu is-hidden-tablet">
                        <a href="#" class="nav-item is-active">
                            Dashboard
                        </a>
                        <a href="#" class="nav-item">
                            Activity
                        </a>
                        <a href="#" class="nav-item">
                            Timeline
                        </a>
                        <a href="#" class="nav-item">
                            Folders
                        </a>
                    </div>
                </div>
            </nav>

            @yield('content')

        </div>
    </div>

@endsection

