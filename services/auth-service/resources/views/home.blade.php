
@extends('layouts.app')

@section('content')

<section class="home-hero py-5">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <span class="hero-eyebrow">ATELIER FRAME · PHOTOGRAPHY STUDIO</span>

                <h1 class="hero-title mt-4">
                    Every moment<br>
                    deserves to be <em>remembered.</em>
                </h1>

                <p class="hero-description mt-4">
                    We capture the little details, the genuine emotions,
                    and the moments you wish could last forever.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('register') }}" class="btn btn-studio">
                        Book Your Session
                    </a>

                    <a href="#services" class="btn btn-outline-studio">
                        Explore Our Studio
                    </a>
                </div>

                <div class="hero-note mt-5">
                    <span>✳</span> Made to capture your story.
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-wrapper">
                    <img
                        src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1200&q=85"
                        alt="Photography camera"
                        class="hero-image"
                    >

                    <div class="hero-image-caption">
                        <span>THE ART OF PRESERVING MOMENTS</span>
                        <span>01 — 04</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="home-services py-5" id="services">
    <div class="container py-4">

        <div class="section-heading text-center mb-5">
            <span class="hero-eyebrow">WHAT WE DO</span>

            <h2 class="section-title mt-3">
                Stories told through <em>photography.</em>
            </h2>

            <p class="section-description mx-auto mt-3">
                From quiet portraits to unforgettable celebrations,
                we give every moment the attention it deserves.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="service-card">
                    <img
                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=85"
                        alt="Portrait photography"
                    >

                    <div class="service-card-content">
                        <span>01</span>
                        <h3>Portraits</h3>
                        <p>Personal stories, genuine expressions, and timeless portraits.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <img
                        src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=85"
                        alt="Event photography"
                    >

                    <div class="service-card-content">
                        <span>02</span>
                        <h3>Events</h3>
                        <p>Preserving the laughter, connections, and unforgettable celebrations.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <img
                        src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?auto=format&fit=crop&w=800&q=85"
                        alt="Creative photography"
                    >

                    <div class="service-card-content">
                        <span>03</span>
                        <h3>Creative Sessions</h3>
                        <p>Unique concepts brought to life through creativity and light.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="home-about py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">

            <div class="col-lg-5">
                <img
                    src="https://images.unsplash.com/photo-1452587925148-ce544e77e70d?auto=format&fit=crop&w=1000&q=85"
                    alt="Photographer capturing a moment"
                    class="about-image"
                >
            </div>

            <div class="col-lg-7">
                <span class="hero-eyebrow">BEHIND THE LENS</span>

                <h2 class="section-title mt-3">
                    More than pictures.<br>
                    <em>Memories that stay.</em>
                </h2>

                <p class="section-description mt-4">
                    At Atelier Frame, we believe photography is more than
                    a beautiful image. It's about capturing a feeling,
                    telling a story, and creating something you'll return
                    to for years to come.
                </p>

                <a href="{{ route('register') }}" class="btn btn-studio mt-3">
                    Let's Create Something
                </a>
            </div>

        </div>
    </div>
</section>


<section class="home-cta py-5">
    <div class="container text-center py-4">
        <span class="hero-eyebrow">YOUR STORY, OUR LENS</span>

        <h2 class="section-title mt-3">
            Ready to capture<br><em>something beautiful?</em>
        </h2>

        <p class="section-description mx-auto mt-3">
            Let's make your next moment one worth remembering.
        </p>

        <a href="{{ route('register') }}" class="btn btn-studio mt-3">
            Get Started
        </a>
    </div>
</section>

@endsection
