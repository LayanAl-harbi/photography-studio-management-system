
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atelier Frame — Photographer Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue: #c9def6;
            --ink: #34241e;
            --brown: #583522;
            --cream: #faf7f1;
            --sand: #e9d9c8;
            --paper: #f0e5d7;
            --line: #e6d9cd;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', Arial, sans-serif;
            font-size: 14px;
        }

        h1, h2, h3, h4, .serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .site {
            width: 100%;
            max-width: none;
            min-height: 100vh;
            margin: 0;
            background: var(--cream);
            overflow: hidden;
        }

        nav {
            background: var(--blue);
            padding: 16px 5%;
            min-height: 80px;
        }

        .brand {
            font: italic 29px/1 'Playfair Display', Georgia, serif;
            color: var(--brown);
            text-decoration: none;
        }

        .brand:hover {
            color: var(--brown);
        }

        .brand small {
            display: block;
            font: 600 9px 'DM Sans', sans-serif;
            letter-spacing: 3px;
            margin-top: 6px;
        }

        .nav-link {
            font-size: 10px;
            letter-spacing: 1.2px;
            font-weight: 700;
            text-transform: uppercase;
            color: #463a35 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #8c5c43 !important;
        }

        .nav-btn {
            font-size: 11px !important;
            border: 1px solid #816451 !important;
            border-radius: 0 !important;
            padding: 8px 14px !important;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 2.8px;
            text-transform: uppercase;
            font-weight: 700;
            color: #927460;
        }

        .hero {
            padding: 72px 7% 68px;
            background: #fffcf8;
            position: relative;
        }

        .hero h1 {
            font-size: clamp(43px, 5.4vw, 78px);
            line-height: 1.06;
            letter-spacing: -2px;
            color: var(--brown);
        }

        .hero h1 em {
            font-weight: 400;
            color: #9d7b69;
        }

        .hero-copy {
            max-width: 460px;
            line-height: 1.9;
            color: #776961;
        }

        .btn-brown {
            display: inline-block;
            background: var(--brown);
            color: white;
            border-radius: 30px;
            padding: 13px 26px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
            border: 1px solid var(--brown);
            text-decoration: none;
        }

        .btn-brown:hover {
            background: #79513b;
            color: white;
        }

        .btn-outline-brown {
            display: inline-block;
            background: transparent;
            color: var(--brown);
            border: 1px solid #a58c7d;
            border-radius: 30px;
            padding: 13px 26px;
            font-size: 12px;
            text-decoration: none;
        }

        .btn-outline-brown:hover {
            background: #f2e5d7;
            color: var(--brown);
        }

        .photographer-panel {
            background: #f0e3d5;
            padding: 18px;
            transform: rotate(-1deg);
            box-shadow: 9px 9px 0 #c9def6;
            max-width: 460px;
            margin: 15px auto;
        }

        .photographer-image {
            height: 250px;
            background: #dcc6ac;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .photographer-image svg {
            width: 110px;
            height: 110px;
            color: #583522;
        }

        .photographer-info {
            padding: 22px 12px 10px;
        }

        .photographer-name {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 32px;
            color: var(--brown);
            margin-bottom: 7px;
        }

        .photographer-id {
            color: #856d5c;
            font-size: 12px;
        }

        .profile-rating {
            border-top: 1px solid #a18e7b40;
            margin-top: 20px;
            padding-top: 18px;
        }

        .stars {
            color: #aa773d;
            letter-spacing: 2px;
            font-size: 22px;
        }

        .rating-number {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 34px;
            color: var(--brown);
        }

        .rating-caption {
            color: #856d5c;
            font-size: 12px;
        }

        .ribbon {
            padding: 13px 0;
            background: #f2e7db;
            border-block: 1px solid #e1d3c4;
            overflow: hidden;
            white-space: nowrap;
            font-family: Georgia, serif;
            font-style: italic;
            color: #6e5142;
            font-size: 14px;
        }

        .ribbon span {
            padding: 0 28px;
        }

        /* Reviews section */
        .review-area {
            padding: 80px 15px;
            background: #f9f2dc;
            background-image:
                linear-gradient(#b5a48140 1px, transparent 1px),
                linear-gradient(90deg, #b5a48140 1px, transparent 1px);
            background-size: 36px 36px;
            position: relative;
            overflow: hidden;
        }

        .review-area:before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 18px;
            background: repeating-linear-gradient(
                115deg,
                #c9def6 0 22px,
                transparent 22px 40px
            );
        }

        .review-wrap {
            max-width: 1120px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .review-top {
            text-align: center;
        }

        .review-kicker {
            font-size: 12px;
            letter-spacing: 2.5px;
            font-weight: 800;
            color: #583522;
            margin-bottom: 16px;
            text-transform: uppercase;
        }

        .review-title {
            font-family: 'DM Sans', sans-serif;
            font-weight: 800;
            line-height: .97;
            letter-spacing: -2px;
            font-size: clamp(42px, 7vw, 79px);
            color: #583522;
            margin: 0;
        }

        .review-title em {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: 600;
            color: #91715e;
        }

        .review-subtitle {
            font-size: 16px;
            color: #493a31;
            margin: 16px auto 0;
            max-width: 680px;
            line-height: 1.5;
        }

        .review-card {
            display: flex;
            flex-direction: column;
            background: white;
            border: 3px solid #745a47;
            box-shadow: 6px 6px 0 #c9def6;
            padding: 23px;
            min-height: 190px;
            height: 100%;
            transform: rotate(.5deg);
            position: relative;
        }

        .review-card.alt-rotate {
            transform: rotate(-.5deg);
        }

        .review-card .stars {
            color: #a7794e;
            letter-spacing: 2px;
            font-size: 22px;
            line-height: 1.4;
        }

        .review-card p {
            font-size: 14px;
            line-height: 1.6;
            margin-top: 16px;
            margin-bottom: 18px;
            color: #46382f;
            overflow-wrap: anywhere;
        }

        .review-meta {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 8px;
        }

        .review-name {
            font-size: 14px;
            font-weight: 800;
            color: #34241e;
        }

        .review-date {
            font-size: 12px;
            color: #806c5c;
        }

        .empty {
            background: #fffdf8;
            padding: 34px;
            text-align: center;
            color: #72645b;
            border: 2px solid #b7a08e;
            max-width: 540px;
            margin: 0 auto;
        }

        .paper-section {
            background: #563322;
            color: #fff8ef;
            position: relative;
            padding: 72px 7%;
        }

        .paper-section h2 {
            font-size: clamp(34px, 4vw, 53px);
        }

        .paper-note {
            background: #e1d7cb;
            color: #422e22;
            padding: 25px 20px;
            max-width: 550px;
            margin: 30px auto;
            transform: rotate(-2deg);
            box-shadow: 0 7px 15px #2a170f30;
        }

        .paper-note strong {
            font-family: Georgia, serif;
            font-style: italic;
            font-weight: 400;
            font-size: 22px;
        }

        .footer {
            background: #c9def6;
            padding: 42px 7%;
            text-align: center;
        }

        .footer .brand {
            font-size: 33px;
        }

        @media (max-width: 991px) {
            .hero {
                padding: 55px 6%;
            }

            .hero h1 {
                font-size: 54px;
            }
        }

        @media (max-width: 767px) {
            .hero {
                padding: 45px 6%;
            }

            .hero h1 {
                font-size: 46px;
            }

            .photographer-panel {
                margin: 30px 7px 10px;
            }

            .photographer-image {
                height: 210px;
            }

            .review-area {
                padding: 55px 15px;
            }

            .review-title {
                letter-spacing: -1px;
            }

            .paper-section {
                padding: 55px 6%;
            }

            .review-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="site" id="home">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0">

            <a href="{{ url('/reviews') }}" class="brand">
                Atelier Frame
                <small>PHOTOGRAPHY STUDIO</small>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="mainNav">

                <ul class="navbar-nav align-items-lg-center gap-lg-3 mt-3 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reviews') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/reviews') }}#photographers">
                            Photographers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reviews') }}#reviews">
                            Client reviews
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reviews') }}#write-review">
                            Leave a review
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-btn" href="{{ url('/reviews') }}#write-review">
                            RATE YOUR SESSION ↗
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- PHOTOGRAPHER PROFILE HERO -->
    <header class="hero">

        <div class="row align-items-center gy-4">

            <div class="col-lg-6">

                <div class="eyebrow mb-3">
                    THE ARTIST BEHIND THE LENS ✦
                </div>

                <h1>
                    Meet your <em>photographer.</em>
                </h1>

                <p class="hero-copy my-4">
                    Every photograph tells a story.
                    Discover the experiences shared by clients
                    and the beautiful memories captured along the way.
                </p>

                <div class="d-flex flex-wrap gap-2">

                    <a href="#reviews" class="btn-brown">
                        Explore client reviews →
                    </a>

                    <a href="{{ url('/reviews') }}" class="btn-outline-brown">
                        All photographers
                    </a>

                </div>

                <div class="mt-5">

                    <div class="eyebrow mb-2">
                        CLIENT EXPERIENCES
                    </div>

                    @if($reviews->count() > 0)

                        <div class="d-flex gap-4 align-items-center flex-wrap">

                            <div>
                                <strong class="rating-number">
                                    {{ number_format($averageRating, 1) }}
                                </strong>

                                <div class="stars" aria-label="Average rating">
                                    ★★★★★
                                </div>
                            </div>

                            <div style="height:50px;border-left:1px solid #ccb6a6"></div>

                            <div>
                                <strong class="rating-number">
                                    {{ $reviews->count() }}
                                </strong>

                                <div class="rating-caption">
                                    client reviews
                                </div>
                            </div>

                        </div>

                    @else

                        <p class="hero-copy">
                            No ratings yet.
                        </p>

                    @endif

                </div>

            </div>

            <!-- PHOTOGRAPHER CARD -->
            <div class="col-lg-6">

                <div class="photographer-panel">

                    <div class="photographer-image">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.4"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">

                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 21v-2a8 8 0 0 1 16 0v2"></path>

                        </svg>

                    </div>

                    <div class="photographer-info">

                        <div class="eyebrow mb-2">
                            PHOTOGRAPHER PROFILE
                        </div>

                        <h2 class="photographer-name">
                            Photographer #{{ $id }}
                        </h2>

                        <div class="photographer-id">
                            Photographer ID: {{ $id }}
                        </div>

                        <div class="profile-rating">

                            @if($reviews->count() > 0)

                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($averageRating))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>

                                <div class="rating-caption mt-2">
                                    {{ number_format($averageRating, 1) }} / 5
                                    · {{ $reviews->count() }} reviews
                                </div>

                            @else

                                <div class="rating-caption">
                                    No ratings yet.
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- RIBBON -->
    <div class="ribbon">

        <span>✦ Capturing the little things</span>
        <span>✳ Real stories, real moments</span>
        <span>✦ Memories made beautifully</span>
        <span>✳ Capturing the little things</span>
        <span>✦ Real stories, real moments</span>

    </div>

    <!-- CLIENT REVIEWS -->
    <section class="review-area" id="reviews">

        <div class="review-wrap">

            <div class="review-top">

                <div class="review-kicker">
                    02 / LITTLE LOVE LETTERS
                </div>

                <h2 class="review-title">
                    KIND <em>words</em>
                    <span
                        aria-hidden="true"
                        style="font-size:.65em;color:#583522">✎</span>
                </h2>

                <p class="review-subtitle">
                    Real thoughts from happy clients —
                    the best part of our day!
                </p>

            </div>

            <div class="row g-4 mt-4">

                @forelse($reviews as $review)

                    <div class="col-md-6 col-lg-4">

                        <article class="review-card {{ $loop->even ? 'alt-rotate' : '' }}">

                            <div
                                class="stars"
                                aria-label="{{ $review->rating }} out of 5 stars">

                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor

                            </div>

                            <p>
                                “{{ $review->comment ?? 'No comment provided.' }}”
                            </p>

                            <div class="review-meta">

                                <div>

                                    <div class="review-name">
                                        Client Review
                                    </div>

                                    <div class="review-date">
                                        for Photographer #{{ $id }}
                                    </div>

                                </div>

                                <div class="review-date">
                                    {{ $review->created_at->format('d M Y') }}
                                </div>

                            </div>

                        </article>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty">
                            No reviews available for this photographer.
                        </div>

                    </div>

                @endforelse

            </div>

            <div class="text-center mt-5">

                <a href="{{ url('/reviews') }}" class="btn-outline-brown">
                    View all reviews ↗
                </a>

            </div>

        </div>

    </section>

    <!-- DECORATIVE SECTION -->
    <section class="paper-section text-center">

        <div class="eyebrow mb-3" style="color:#dac2af">
            MORE THAN JUST PICTURES
        </div>

        <h2>
            What makes a moment <em>unforgettable?</em>
        </h2>

        <div class="paper-note">

            <strong>
                "The most beautiful photographs are the ones
                that tell your story."
            </strong>

        </div>

        <a
            href="{{ url('/reviews') }}#write-review"
            class="btn"
            style="background:#c9def6;border-radius:28px;padding:12px 42px;color:#503223;font-size:12px">

            Tell us your story ↗

        </a>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <a class="brand d-inline-block" href="{{ url('/reviews') }}">
            Atelier Frame
            <small>PHOTOGRAPHY STUDIO</small>
        </a>

        <p class="mt-3 mb-1">
            A little bit of magic in every frame.
        </p>

        <div class="small" style="color:#6b5a4e">
            User Profiles & Reviews Service · CS383 Group 5
        </div>

    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
