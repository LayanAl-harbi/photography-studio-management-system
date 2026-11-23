
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Atelier Frame — Photographer Reviews</title>

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
    background: #826a5e;
    color: var(--ink);
    font-family: 'DM Sans', Arial, sans-serif;
    font-size: 14px;
}

h1, h2, h3, h4, .serif {
    font-family: 'Playfair Display', Georgia, serif;
}

/* Full-width responsive layout */
.site {
    width: 100%;
    max-width: none;
    min-height: 100vh;
    margin: 0;
    background: var(--cream);
    box-shadow: none;
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
    max-width: 570px;
}

.hero h1 em {
    font-weight: 400;
    color: #9d7b69;
}

.hero-copy {
    max-width: 430px;
    line-height: 1.9;
    color: #776961;
}

.btn-brown {
    background: var(--brown);
    color: white;
    border-radius: 30px;
    padding: 13px 26px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .5px;
    border: 1px solid var(--brown);
}

.btn-brown:hover {
    background: #79513b;
    color: white;
}

.btn-outline-brown {
    background: transparent;
    color: var(--brown);
    border: 1px solid #a58c7d;
    border-radius: 30px;
    padding: 13px 26px;
    font-size: 12px;
}

.btn-outline-brown:hover {
    background: #f2e5d7;
}

.hero-art {
    height: 400px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.photo-big {
    width: 76%;
    height: 340px;
    object-fit: cover;
    transform: rotate(-4deg);
    border: 9px solid white;
    box-shadow: 0 20px 50px #462d2430;
}

.photo-small {
    position: absolute;
    right: -5%;
    bottom: 4px;
    width: 44%;
    height: 180px;
    object-fit: cover;
    transform: rotate(8deg);
    border: 8px solid white;
    box-shadow: 0 12px 25px #321e1530;
}

.stamp {
    position: absolute;
    left: -1%;
    bottom: 13px;
    width: 120px;
    height: 120px;
    border: 1px dashed var(--brown);
    border-radius: 100%;
    background: #fbf2e7f2;
    display: grid;
    place-content: center;
    text-align: center;
    transform: rotate(-12deg);
    font-family: Georgia, serif;
    font-size: 17px;
    font-style: italic;
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

.section {
    padding: 75px 7%;
}

.section-title {
    font-size: clamp(36px, 4vw, 54px);
    line-height: 1.1;
}

.section-intro {
    line-height: 1.8;
    color: #85756a;
    max-width: 530px;
}

.soft-blue {
    background: #e9f1f9;
}

.photographer-card {
    background: #f0e3d5;
    padding: 12px;
    position: relative;
    transition: transform .2s;
    height: 100%;
}

.photographer-card:hover {
    transform: translateY(-5px);
}

.photographer-card img {
    height: 238px;
    width: 100%;
    object-fit: cover;
}

.photographer-card .name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 24px;
    margin-bottom: 2px;
}

.photographer-card .specialty {
    color: #856d5c;
    font-size: 12px;
}

.card-blue {
    background: #c9dff4;
}

.card-deep {
    background: #dcc6ac;
}

.card-actions {
    border-top: 1px solid #a18e7b40;
    padding-top: 15px;
    margin-top: 14px;
}

.text-link {
    color: #4f3324;
    text-decoration: none;
    font-weight: 700;
    font-size: 12px;
    border-bottom: 1px solid #a17d68;
    padding-bottom: 3px;
}

.stars {
    color: #aa773d;
    letter-spacing: 2px;
    font-size: 19px;
}

.star-small {
    font-size: 15px;
}

.review-area {
    background: #f3ecd9;
    position: relative;
    overflow: hidden;
    background-image:
        linear-gradient(#cbbba855 1px, transparent 1px),
        linear-gradient(90deg, #cbbba855 1px, transparent 1px);
    background-size: 34px 34px;
}

.review-area:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 17px;
    background: repeating-linear-gradient(
        115deg,
        var(--blue) 0 22px,
        transparent 22px 40px
    );
    opacity: .95;
}

.review-wrap {
    position: relative;
    z-index: 1;
}

.review-top {
    text-align: center;
}

.review-kicker {
    font-size: 10px;
    letter-spacing: 2.8px;
    text-transform: uppercase;
    font-weight: 700;
    color: #6a564a;
    margin-bottom: 14px;
}

.review-title {
    font-size: clamp(56px, 7vw, 100px);
    font-weight: 700;
    letter-spacing: -2px;
    line-height: .92;
    color: var(--brown);
    margin: 0;
}

.review-title em {
    color: #8b6d5c;
    font-style: italic;
    font-weight: 400;
}

.review-subtitle {
    font-size: 15px;
    color: #6c5a4f;
    max-width: 520px;
    margin: 20px auto 0;
    line-height: 1.8;
}

.review-filters {
    max-width: 730px;
    margin: 30px auto 36px;
}

.review-filters .form-select {
    background: #fffdf8;
    border: 2px solid #886854;
    min-height: 50px;
    border-radius: 4px;
    font-size: 14px;
    color: #3e2b23;
    padding-left: 16px;
    padding-right: 42px;
    box-shadow: none;
}

.review-filters .form-select:focus {
    border-color: #715444;
    box-shadow: 0 0 0 .2rem #c9def655;
}

.form-select,
.form-control {
    border-color: #d9c9b9;
    border-radius: 0;
    font-size: 13px;
    min-height: 43px;
}

.form-control:focus,
.form-select:focus {
    border-color: #806b5d;
    box-shadow: 0 0 0 .15rem #b5d6ee60;
}

.review-card {
    background: #fcfbf7;
    padding: 30px 26px 24px;
    border: 3px solid #6f8ea3;
    box-shadow: 8px 8px 0 #d6c4b4;
    height: 100%;
    position: relative;
    transform: rotate(-1deg);
}

.review-card.alt-rotate {
    transform: rotate(1deg);
}

.review-card:before {
    content: '“';
    position: absolute;
    right: 18px;
    top: -8px;
    font: 74px Georgia, serif;
    color: #cfdfef;
}

.review-card p {
    line-height: 1.8;
    color: #4f4038;
    min-height: 88px;
    font-size: 14px;
}

.review-meta {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 12px;
    margin-top: 18px;
}

.review-name {
    font-weight: 800;
    font-size: 16px;
    color: #3d2d25;
}

.review-for,
.review-date {
    font-size: 12px;
    color: #8a7768;
}

.avatar {
    display: none;
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

.mini-notes {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin: 30px 0;
}

.note {
    background: #e1d7cb;
    color: #422e22;
    padding: 25px 20px;
    min-height: 150px;
    transform: rotate(-2deg);
    box-shadow: 0 7px 15px #2a170f30;
}

.note:nth-child(2) {
    background: #c6dff7;
    transform: rotate(2deg);
}

.note:nth-child(3) {
    background: #f5e9c2;
    transform: rotate(-1deg);
}

.note strong {
    font-family: Georgia, serif;
    font-style: italic;
    font-weight: 400;
    font-size: 20px;
}

.form-panel {
    background: #fffaf4;
    border: 1px solid #e8d9cb;
    padding: 30px;
    box-shadow: 7px 7px 0 #dfd0bf;
}

.rating-button {
    border: 0;
    background: none;
    font-size: 38px;
    color: #cdbeb0;
    padding: 0 3px;
    line-height: 1.1;
    transition: transform .1s;
}

.rating-button:hover {
    transform: scale(1.12);
}

.rating-button.selected {
    color: #af7d44;
}

.footer {
    background: #c9def6;
    padding: 42px 7%;
    text-align: center;
}

.footer .brand {
    font-size: 33px;
}

.chip {
    background: #e8f2fc;
    border-radius: 20px;
    padding: 5px 12px;
    font-size: 11px;
    color: #604a3a;
    font-weight: 600;
}

.notice {
    background: #e8f1fb;
    border-left: 3px solid #9abedc;
    padding: 13px 15px;
    color: #574a42;
    font-size: 12px;
}

.toast-box {
    position: fixed;
    right: 24px;
    bottom: 24px;
    background: #503223;
    color: white;
    padding: 16px 24px;
    z-index: 9999;
    display: none;
    box-shadow: 0 10px 25px #0003;
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

@media(max-width:991px) {
    .hero {
        padding: 55px 6%;
    }

    .hero-art {
        height: 320px;
    }

    .photo-big {
        height: 270px;
    }

    .photo-small {
        height: 140px;
    }

    .hero h1 {
        font-size: 54px;
    }
}

@media(max-width:767px) {
    .site {
        margin: 0;
    }

    .hero {
        padding: 45px 6%;
    }

    .hero h1 {
        font-size: 46px;
    }

    .hero-art {
        margin-top: 30px;
        height: 300px;
    }

    .photo-big {
        height: 265px;
    }

    .section {
        padding: 55px 6%;
    }

    .mini-notes {
        grid-template-columns: 1fr;
    }

    .note {
        min-height: 100px;
    }

    .paper-section {
        padding: 55px 6%;
    }

    .form-panel {
        padding: 20px;
    }

    .photographer-card img {
        height: 270px;
    }
}

/* Reviews: exact layout of the scrapbook/pink reference, recolored for Atelier Frame */

.review-area.section {
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
    height: 18px;
    background: repeating-linear-gradient(
        115deg,
        #c9def6 0 22px,
        transparent 22px 40px
    );
    opacity: 1;
}

.review-area .review-wrap {
    max-width: 1120px;
    margin: 0 auto;
    position: relative;
}

.review-area .review-top {
    text-align: center;
}

.review-area .review-kicker {
    font-size: 12px;
    letter-spacing: 2.5px;
    font-weight: 800;
    color: #583522;
    margin-bottom: 16px;
}

.review-area .review-title {
    font-family: 'DM Sans', sans-serif;
    font-weight: 800;
    line-height: .97;
    letter-spacing: -2px;
    font-size: clamp(42px, 7vw, 79px);
    color: #583522;
    margin: 0;
}

.review-area .review-title em {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-weight: 600;
    color: #91715e;
}

.review-area .review-subtitle {
    font-size: 16px;
    color: #493a31;
    margin: 16px auto 0;
    max-width: 680px;
    line-height: 1.5;
}

.review-area .review-filters {
    max-width: 580px;
    margin: 25px auto 37px;
}

.review-area .review-filters .form-select {
    height: 43px;
    min-height: 43px;
    font-size: 13px;
    padding: 6px 36px 6px 12px;
    background-color: #fff;
    border: 2px solid #735b49;
    border-radius: 3px;
    color: #34241e;
    box-shadow: none;
}

.review-area .review-filters .form-select:focus {
    border-color: #789ebc;
    box-shadow: 0 0 0 .2rem #c9def655;
}

.review-area .review-card {
    background: #fff;
    border: 3px solid #745a47;
    box-shadow: 6px 6px 0 #c9def6;
    padding: 23px;
    min-height: 190px;
    height: 100%;
    transform: rotate(.5deg);
    position: relative;
}

.review-area .review-card.alt-rotate {
    transform: rotate(-.5deg);
}

.review-area .review-card:before {
    content: none;
}

.review-area .review-card .stars {
    color: #a7794e;
    letter-spacing: 2px;
    font-size: 22px;
    line-height: 1.4;
    margin-bottom: 0 !important;
}

.review-area .review-card p {
    font-size: 14px;
    line-height: 1.6;
    min-height: 0;
    margin-top: 16px !important;
    margin-bottom: 18px;
    color: #46382f;
}

.review-area .review-meta {
    margin-top: auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 8px;
}

.review-area .review-name {
    font-size: 14px;
    font-weight: 800;
    color: #34241e;
}

.review-area .review-for,
.review-area .review-date {
    font-size: 12px;
    color: #806c5c;
}

.review-area .review-card {
    display: flex;
    flex-direction: column;
}

.review-area #reviewGrid {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 1.5rem;
}

@media(max-width:767px) {
    .review-area.section {
        padding: 55px 15px;
    }

    .review-area .review-title {
        letter-spacing: -1px;
    }

    .review-area .review-filters {
        margin: 25px auto 37px;
    }
}
</style>
</head>

<body>
<div class="site" id="home">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid p-0">
        <a href="#home" class="brand">
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
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#photographers">Photographers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews">Client reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#write-review">Leave a review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-btn" href="#write-review">
                        RATE YOUR SESSION ↗
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero">
    <div class="row align-items-center gy-4">
        <div class="col-lg-6">
            <div class="eyebrow mb-3">
                THE STORIES BEHIND THE LENS ✦
            </div>

            <h1>
                Every frame <em>tells a beautiful story.</em>
            </h1>

            <p class="hero-copy my-4">
                Meet the artists who turn your moments into memories.
                Discover their work, read real client experiences,
                and share the magic of your own session.
            </p>

            <div class="d-flex flex-wrap gap-2">
                <a href="#photographers" class="btn btn-brown">
                    Explore photographers →
                </a>
                <a href="#write-review" class="btn btn-outline-brown">
                    Share your experience
                </a>
            </div>

            <div class="mt-5 d-flex gap-4 align-items-center">
                <div>
                    <strong style="font:28px Georgia,serif" id="heroAverage">4.9</strong>
                    <div class="stars star-small">★★★★★</div>
                </div>

                <div style="height:42px;border-left:1px solid #ccb6a6"></div>

                <div>
                    <strong style="font:28px Georgia,serif" id="heroCount">06</strong>
                    <div class="small text-secondary">
                        client experiences
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="hero-art">
                <img
                    class="photo-big"
                    src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=850&q=85&auto=format&fit=crop"
                    alt="Photographer holding camera">

                <img
                    class="photo-small"
                    src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=85&auto=format&fit=crop"
                    alt="Wedding photography">

                <div class="stamp">
                    Moments<br>to remember<br>✳
                </div>
            </div>
        </div>
    </div>
</header>

<div class="ribbon">
    <span>✦ Capturing the little things</span>
    <span>✳ Real stories, real moments</span>
    <span>✦ Memories made beautifully</span>
    <span>✳ Capturing the little things</span>
    <span>✦ Real stories, real moments</span>
</div>

<section class="section" id="photographers">
    <div class="text-center">
        <div class="eyebrow mb-3">
            MEET YOUR CREATIVE TEAM
        </div>

        <h2 class="section-title">
            Behind <em>the lens</em>
        </h2>

        <p class="section-intro mx-auto mt-3">
            Every photographer has their own way of seeing the world.
            Discover the perfect style for your special moment.
        </p>
    </div>

    <div class="row g-4 mt-4" id="photographerGrid"></div>
</section>

<section class="section review-area" id="reviews">
    <div class="review-wrap">
        <div class="review-top">
            <div class="review-kicker">
                02 / LITTLE LOVE LETTERS
            </div>

            <h2 class="review-title">
                KIND <em>words</em>
                <span aria-hidden="true" style="font-size:.65em;color:#583522">✎</span>
            </h2>

            <p class="review-subtitle">
                Real thoughts from happy clients — the best part of our day!
            </p>
        </div>

        <div class="row justify-content-center review-filters g-2">
            <div class="col-md-7">
                <select
                    id="reviewFilter"
                    class="form-select"
                    aria-label="Filter reviews by photographer">
                    <option value="all">All photographers</option>
                </select>
            </div>

            <div class="col-md-4">
                <select
                    id="starFilter"
                    class="form-select"
                    aria-label="Filter reviews by rating">
                    <option value="all">All ratings</option>
                    <option value="5">5 stars</option>
                    <option value="4">4 stars</option>
                    <option value="3">3 stars</option>
                    <option value="2">2 stars</option>
                    <option value="1">1 star</option>
                </select>
            </div>
        </div>

        <div class="row g-4" id="reviewGrid"></div>

        <div class="text-center mt-4">
            <a href="#write-review" class="btn btn-outline-brown">
                Leave your own review ↗
            </a>
        </div>
    </div>
</section>

<section class="paper-section text-center">
    <div class="eyebrow mb-3" style="color:#dac2af">
        MORE THAN JUST PICTURES
    </div>

    <h2>
        What makes a moment <em>unforgettable?</em>
    </h2>

    <div class="mini-notes">
        <div class="note">
            <div class="small mb-3">
                01 — CONNECTION
            </div>
            <strong>
                Feeling comfortable being yourself.
            </strong>
        </div>

        <div class="note">
            <div class="small mb-3">
                02 — CREATIVITY
            </div>
            <strong>
                Seeing familiar moments in a new light.
            </strong>
        </div>

        <div class="note">
            <div class="small mb-3">
                03 — MEMORIES
            </div>
            <strong>
                Keeping the little things forever.
            </strong>
        </div>
    </div>

    <a
        href="#write-review"
        class="btn"
        style="background:#c9def6;border-radius:28px;padding:12px 42px;color:#503223;font-size:12px">
        Tell us your story ↗
    </a>
</section>

<section class="section soft-blue" id="write-review">
    <div class="row g-5 align-items-start">
        <div class="col-lg-5">
            <div class="eyebrow mb-3">
                YOUR EXPERIENCE MATTERS
            </div>

            <h2 class="section-title">
                Leave a <em>little love note.</em>
            </h2>

            <p class="section-intro mt-4">
                Had a session with us? Your feedback makes a difference.
                Select your completed booking, rate your photographer,
                and tell us about the experience.
            </p>

            <div class="notice mt-4">
                ✦ Only clients with a
                <strong>completed photography session</strong>
                can submit a review. This demo includes sample
                completed bookings for testing.
            </div>

            <div
                class="mt-5 serif"
                style="font-style:italic;font-size:26px;color:#624332">
                Thank you for being part of our story. ♡
            </div>
        </div>

        <div class="col-lg-7">
            <form id="reviewForm" class="form-panel">
                <div class="eyebrow mb-3">
                    YOUR REVIEW CARD
                </div>

                <h3 style="font-size:31px" class="mb-4">
                    How was your session?
                </h3>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label
                            class="form-label fw-semibold"
                            for="clientName">
                            Your name
                        </label>

                        <input
                            class="form-control"
                            id="clientName"
                            maxlength="60"
                            placeholder="e.g. Sarah A."
                            required>
                    </div>

                    <div class="col-md-6">
                        <label
                            class="form-label fw-semibold"
                            for="bookingSelect">
                            Completed booking
                        </label>

                        <select
                            id="bookingSelect"
                            class="form-select"
                            required>
                            <option value="">
                                Select your booking
                            </option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label
                            class="form-label fw-semibold"
                            for="photographerSelect">
                            Photographer
                        </label>

                        <select
                            class="form-select"
                            id="photographerSelect"
                            disabled
                            required>
                            <option value="">
                                Select a completed booking first
                            </option>
                        </select>

                        <div class="form-text">
                            Automatically selected based on your booking.
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold d-block">
                            Your rating
                        </label>

                        <div
                            id="ratingStars"
                            class="d-flex"
                            role="group"
                            aria-label="Choose a rating from 1 to 5 stars">

                            <button
                                type="button"
                                class="rating-button"
                                data-value="1"
                                aria-label="1 star">★</button>

                            <button
                                type="button"
                                class="rating-button"
                                data-value="2"
                                aria-label="2 stars">★</button>

                            <button
                                type="button"
                                class="rating-button"
                                data-value="3"
                                aria-label="3 stars">★</button>

                            <button
                                type="button"
                                class="rating-button"
                                data-value="4"
                                aria-label="4 stars">★</button>

                            <button
                                type="button"
                                class="rating-button"
                                data-value="5"
                                aria-label="5 stars">★</button>
                        </div>

                        <div class="form-text" id="ratingLabel">
                            Choose your stars
                        </div>
                    </div>

                    <div class="col-12">
                        <label
                            class="form-label fw-semibold"
                            for="comment">
                            Your experience
                        </label>

                        <textarea
                            class="form-control"
                            id="comment"
                            rows="5"
                            maxlength="650"
                            minlength="10"
                            placeholder="Tell us about the moments you loved..."
                            required></textarea>
                    </div>

                    <div class="col-12">
                        <button
                            class="btn btn-brown mt-2"
                            type="submit">
                            Publish my review ↗
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<footer class="footer">
    <a class="brand d-inline-block" href="#home">
        Atelier Frame
        <small>PHOTOGRAPHY STUDIO</small>
    </a>

    <p class="mt-3 mb-1">
        A little bit of magic in every frame.
    </p>

    <div class="small" style="color:#6b5a4e">
        User Profiles & Reviews Service · CS383 Group 5 · Dana Aljehani
    </div>

    <div class="small mt-2">
        Front-end prototype built with Bootstrap 5 · Sample data only
    </div>
</footer>

</div>

<div id="toast" class="toast-box" role="status" aria-live="polite"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const photographers = [
    {
        id: 'p1',
        name: 'Lina Carter',
        specialty: 'Portraits & Graduation',
        image: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=700&q=85&auto=format&fit=crop',
        theme: ''
    },
    {
        id: 'p2',
        name: 'Amelia Rose',
        specialty: 'Weddings & Celebrations',
        image: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=700&q=85&auto=format&fit=crop',
        theme: 'card-blue'
    },
    {
        id: 'p3',
        name: 'Noah Bennett',
        specialty: 'Lifestyle & Family',
        image: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=700&q=85&auto=format&fit=crop',
        theme: 'card-deep'
    }
];

const bookings = [
    {
        id: 'BK-1001',
        label: 'BK-1001 · Graduation session',
        photographer: 'p1'
    },
    {
        id: 'BK-1002',
        label: 'BK-1002 · Wedding session',
        photographer: 'p2'
    },
    {
        id: 'BK-1003',
        label: 'BK-1003 · Family session',
        photographer: 'p3'
    },
    {
        id: 'BK-1004',
        label: 'BK-1004 · Portrait session',
        photographer: 'p1'
    }
];

const seedReviews = [
    {
        id: 'r1',
        bookingId: 'seed1',
        name: 'Sophia M.',
        photographer: 'p1',
        rating: 5,
        comment: 'Lina made my graduation shoot feel so natural and fun. Every photo was exactly how I imagined it!',
        date: 'Oct 18, 2026'
    },
    {
        id: 'r2',
        bookingId: 'seed2',
        name: 'Emma W.',
        photographer: 'p2',
        rating: 5,
        comment: 'The attention to every little detail was incredible. These pictures will be cherished forever.',
        date: 'Oct 12, 2026'
    },
    {
        id: 'r3',
        bookingId: 'seed3',
        name: 'Olivia R.',
        photographer: 'p3',
        rating: 5,
        comment: 'We felt at ease the entire time. The family portraits are warm, candid, and completely us.',
        date: 'Sep 29, 2026'
    },
    {
        id: 'r4',
        bookingId: 'seed4',
        name: 'Maya T.',
        photographer: 'p1',
        rating: 4,
        comment: 'Wonderful portrait experience and beautiful lighting. I loved the creativity and the final results.',
        date: 'Sep 22, 2026'
    },
    {
        id: 'r5',
        bookingId: 'seed5',
        name: 'Isabella C.',
        photographer: 'p2',
        rating: 5,
        comment: 'Amelia captured the most genuine moments from our celebration. Such a lovely experience!',
        date: 'Sep 15, 2026'
    },
    {
        id: 'r6',
        bookingId: 'seed6',
        name: 'Ava J.',
        photographer: 'p3',
        rating: 5,
        comment: 'Patient, kind, and so talented. Our photos look like little pieces of a beautiful story.',
        date: 'Sep 02, 2026'
    }
];

const $ = id => document.getElementById(id);

let rating = 0;

const key = 'atelier_frame_reviews_v1';

let saved = [];

try {
    const raw = JSON.parse(localStorage.getItem(key) || '[]');

    if (Array.isArray(raw)) {
        saved = raw.filter(r =>
            r &&
            typeof r.comment === 'string' &&
            typeof r.name === 'string' &&
            Number.isInteger(r.rating) &&
            r.rating >= 1 &&
            r.rating <= 5 &&
            photographers.some(p => p.id === r.photographer)
        );
    }
} catch(e) {}

let allReviews = () => [...saved, ...seedReviews];

const clean = s => String(s).replace(
    /[&<>"']/g,
    c => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
    }[c])
);

const starString = n => '★'.repeat(n) + '☆'.repeat(5 - n);

const byId = id => photographers.find(p => p.id === id);

const average = id => {
    const list = allReviews().filter(r => r.photographer === id);

    return list.length
        ? (
            list.reduce((a, r) => a + r.rating, 0) / list.length
          ).toFixed(1)
        : '—';
};

function renderPhotographers() {
    $('photographerGrid').innerHTML = photographers.map(p => `
        <div class="col-md-4">
            <article class="photographer-card ${p.theme}">
                <img
                    src="${p.image}"
                    alt="${clean(p.name)} portrait"
                    loading="lazy">

                <div class="px-2 pt-3">
                    <div class="eyebrow mb-2">
                        PHOTOGRAPHER PROFILE
                    </div>

                    <h3 class="name">${clean(p.name)}</h3>

                    <div class="specialty">
                        ${clean(p.specialty)}
                    </div>

                    <div class="d-flex justify-content-between align-items-center card-actions">
                        <div>
                            <span class="stars star-small">★★★★★</span>
                            <span class="ms-1 small">
                                ${average(p.id)} ·
                                ${allReviews().filter(r => r.photographer === p.id).length} reviews
                            </span>
                        </div>

                        <a
                            class="text-link"
                            href="#reviews"
                            data-filter="${p.id}">
                            View reviews ↗
                        </a>
                    </div>
                </div>
            </article>
        </div>
    `).join('');

    document.querySelectorAll('[data-filter]').forEach(a =>
        a.addEventListener('click', () => {
            $('reviewFilter').value = a.dataset.filter;
            renderReviews();
        })
    );
}

function renderReviews() {
    let list = allReviews();

    const pid = $('reviewFilter').value;
    const stars = $('starFilter').value;

    if (pid !== 'all') {
        list = list.filter(r => r.photographer === pid);
    }

    if (stars !== 'all') {
        list = list.filter(r => r.rating === Number(stars));
    }

    $('reviewGrid').innerHTML = list.length
        ? list.map((r, i) => `
            <div class="col-md-6 col-lg-4">
                <article class="review-card ${i % 2 ? 'alt-rotate' : ''}">
                    <div
                        class="stars mb-3"
                        aria-label="${r.rating} out of 5 stars">
                        ${starString(r.rating)}
                    </div>

                    <p>“${clean(r.comment)}”</p>

                    <div class="review-meta">
                        <div>
                            <div class="review-name">
                                ${clean(r.name)}
                            </div>

                            <div class="review-for">
                                for ${clean(byId(r.photographer).name)}
                            </div>
                        </div>

                        <div class="review-date">
                            ${clean(r.date)}
                        </div>
                    </div>
                </article>
            </div>
        `).join('')
        : '<div class="col-12"><div class="empty">No reviews match these filters. Try another photographer or rating.</div></div>';

    $('heroCount').textContent =
        String(allReviews().length).padStart(2, '0');

    $('heroAverage').textContent =
        (
            allReviews().reduce((a, r) => a + r.rating, 0)
            / allReviews().length
        ).toFixed(1);
}

photographers.forEach(p =>
    $('reviewFilter').add(new Option(p.name, p.id))
);

bookings.forEach(b =>
    $('bookingSelect').add(new Option(b.label, b.id))
);

$('bookingSelect').addEventListener('change', () => {
    const b = bookings.find(
        x => x.id === $('bookingSelect').value
    );

    $('photographerSelect').innerHTML = b
        ? `<option value="${b.photographer}">${byId(b.photographer).name}</option>`
        : '<option value="">Select a completed booking first</option>';
});

$('reviewFilter').addEventListener('change', renderReviews);
$('starFilter').addEventListener('change', renderReviews);

const resetBtn = $('resetFilters');

if (resetBtn) {
    resetBtn.addEventListener('click', () => {
        $('reviewFilter').value = 'all';
        $('starFilter').value = 'all';
        renderReviews();
    });
}

document.querySelectorAll('.rating-button').forEach(b =>
    b.addEventListener('click', () => {
        rating = Number(b.dataset.value);

        document.querySelectorAll('.rating-button').forEach(x => {
            x.classList.toggle(
                'selected',
                Number(x.dataset.value) <= rating
            );

            x.setAttribute(
                'aria-pressed',
                Number(x.dataset.value) === rating
                    ? 'true'
                    : 'false'
            );
        });

        $('ratingLabel').textContent =
            rating + ' out of 5 stars';
    })
);

let toastTimer;

$('reviewForm').addEventListener('submit', e => {
    e.preventDefault();

    const booking = bookings.find(
        b => b.id === $('bookingSelect').value
    );

    const name = $('clientName').value.trim();
    const comment = $('comment').value.trim();

    if (!booking) {
        notify('Select a completed booking first.');
        return;
    }

    if (!rating) {
        notify('Choose a star rating first.');
        return;
    }

    if (name.length < 2 || comment.length < 10) {
        notify('Please enter a name and a comment of at least 10 characters.');
        return;
    }

    if (saved.some(r => r.bookingId === booking.id)) {
        notify('This booking already has a submitted review.');
        return;
    }

    saved.unshift({
        id: 'review-' + Date.now(),
        bookingId: booking.id,
        name,
        photographer: booking.photographer,
        rating,
        comment,
        date: new Date().toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        })
    });

    try {
        localStorage.setItem(key, JSON.stringify(saved));
    } catch(e) {
        notify('Review added for this session, but browser storage is unavailable.');
    }

    renderPhotographers();

    $('reviewFilter').value = booking.photographer;
    $('starFilter').value = 'all';

    renderReviews();

    e.target.reset();

    $('photographerSelect').innerHTML =
        '<option value="">Select a completed booking first</option>';

    rating = 0;

    document.querySelectorAll('.rating-button').forEach(x => {
        x.classList.remove('selected');
        x.setAttribute('aria-pressed', 'false');
    });

    $('ratingLabel').textContent = 'Choose your stars';

    notify('Thank you! Your review has been published.');

    $('reviews').scrollIntoView({
        behavior: 'smooth'
    });
});

function notify(s) {
    const t = $('toast');

    t.textContent = s;
    t.style.display = 'block';

    clearTimeout(toastTimer);

    toastTimer = setTimeout(() => {
        t.style.display = 'none';
    }, 3600);
}

renderPhotographers();
renderReviews();
</script>

</body>
</html>
