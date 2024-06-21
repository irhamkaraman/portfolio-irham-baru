@extends('layouts.home') @section('content')

<main>

    @include('component.sidebar-home')

    <div class="main-content">

        <nav class="navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <button class="navbar-link active" data-nav-link>Tentang</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>Resume</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>Portfolio</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>Blog</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>Contact</button>
                </li>
            </ul>
        </nav>

        @include('component.about-home')

        @include('component.resume-home')

        @include('component.portfolio-home')

        @include('component.blog-home')

        @include('component.contact-home')

    </div>
</main>

@endsection
