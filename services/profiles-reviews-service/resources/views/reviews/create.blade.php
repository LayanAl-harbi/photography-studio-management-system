
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atelier Frame — Add Review</title>

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
            margin: 0;
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
            display: flex;
            flex-direction: column;
        }

        /* Navbar */

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

        /* Main section */

        .review-section {
            flex: 1;
            padding: 80px 7%;
            background: #e9f1f9;
        }

        .review-layout {
            max-width: 1120px;
            margin: 0 auto;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 2.8px;
            text-transform: uppercase;
            font-weight: 700;
            color: #927460;
        }

        .section-title {
            font-size: clamp(40px, 5vw, 68px);
            line-height: 1.1;
            color: var(--brown);
        }

        .section-title em {
            color: #9d7b69;
            font-weight: 400;
        }

        .section-intro {
            line-height: 1.8;
            color: #85756a;
            max-width: 480px;
        }

        /* Form */

        .form-panel {
            background: #fffaf4;
            border: 1px solid #e8d9cb;
            padding: 35px;
            box-shadow: 7px 7px 0 #dfd0bf;
        }

        .form-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 34px;
            color: var(--brown);
            margin-bottom: 28px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #583522;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            border: 1px solid #d9c9b9;
            border-radius: 0;
            font-size: 13px;
            min-height: 45px;
            padding: 11px 15px;
            background-color: #fffdf8;
            color: var(--ink);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #806b5d;
            box-shadow: 0 0 0 .15rem #b5d6ee60;
            background-color: white;
        }

        .form-control::placeholder {
            color: #a9988a;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-text {
            color: #927e70;
            font-size: 11px;
            margin-top: 7px;
        }

        .form-divider {
            border-top: 1px solid #e8d9cb;
            margin: 28px 0;
        }

        /* Buttons */

        .btn-brown {
            display: inline-block;
            background: var(--brown);
            color: white;
            border: 1px solid var(--brown);
            border-radius: 30px;
            padding: 13px 26px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
            text-decoration: none;
        }

        .btn-brown:hover {
            background: #79513b;
            color: white;
        }

        .btn-brown:disabled {
            background: var(--brown);
            border-color: var(--brown);
            color: white;
            opacity: .55;
            cursor: not-allowed;
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

        /* Notice */

        .notice {
            background: #e8f1fb;
            border-left: 3px solid #9abedc;
            padding: 15px 18px;
            color: #574a42;
            font-size: 12px;
            line-height: 1.8;
        }

        /* Decorative notes */

        .decorative-text {
            font-family: 'Playfair Display', Georgia, serif;
            font-style: italic;
            font-size: 26px;
            color: #624332;
        }

        .paper-note {
            background: #f0e5d7;
            padding: 25px 20px;
            max-width: 450px;
            margin-top: 35px;
            transform: rotate(-2deg);
            box-shadow: 0 7px 15px #2a170f20;
        }

        .paper-note strong {
            font-family: Georgia, serif;
            font-size: 21px;
            font-style: italic;
            font-weight: 400;
            color: var(--brown);
        }

        /* Ribbon */

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

        /* Footer */

        .footer {
            background: #c9def6;
            padding: 42px 7%;
            text-align: center;
        }

        .footer .brand {
            font-size: 33px;
        }

        /* Responsive */

        @media (max-width: 991px) {
            .review-section {
                padding: 55px 6%;
            }
        }

        @media (max-width: 767px) {
            .review-section {
                padding: 45px 6%;
            }

            .section-title {
                font-size: 42px;
            }

            .form-panel {
                padding: 22px;
            }

            .form-title {
                font-size: 29px;
            }

            .decorative-text {
                font-size: 23px;
            }

            .paper-note strong {
                font-size: 18px;
            }

            .btn-brown,
            .btn-outline-brown {
                text-align: center;
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
                        <a class="nav-link" href="{{ url('/reviews') }}#photographers">
                            Photographers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reviews') }}#reviews">
                            Client reviews
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Leave a review
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-btn" href="#reviewForm">
                            RATE YOUR SESSION ↗
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- ADD REVIEW -->
    <main class="review-section">

        <div class="review-layout">

            <div class="row g-5 align-items-start">

                <!-- LEFT CONTENT -->
                <div class="col-lg-5">

                    <div class="eyebrow mb-3">
                        YOUR EXPERIENCE MATTERS ✦
                    </div>

                    <h1 class="section-title">
                        Leave a <em>little love note.</em>
                    </h1>

                    <p class="section-intro mt-4">
                        Had a session with us?
                        Your feedback makes a difference.
                        Share your experience and tell us
                        about the moments you loved.
                    </p>

                    <div class="notice mt-4">
                        ✦ Only clients with a
                        <strong>completed photography session</strong>
                        can submit a review.
                        Review submission will be enabled
                        after authentication and booking integration.
                    </div>

                    <div class="mt-5 decorative-text">
                        Thank you for being part of our story. ♡
                    </div>

                    <div class="paper-note">
                        <strong>
                            "Every review is a little part
                            of our photography story."
                        </strong>
                    </div>

                </div>

                <!-- RIGHT FORM -->
                <div class="col-lg-7">

                    <form id="reviewForm" class="form-panel">

                        <div class="eyebrow mb-3">
                            YOUR REVIEW CARD
                        </div>

                        <h2 class="form-title">
                            How was your session?
                        </h2>

                        <div class="row g-3">

                            <!-- BOOKING ID -->
                            <div class="col-md-6">

                                <label
                                    for="booking_id"
                                    class="form-label">
                                    Booking ID
                                </label>

                                <input
                                    type="number"
                                    id="booking_id"
                                    name="booking_id"
                                    class="form-control"
                                    min="1"
                                    placeholder="Enter booking ID"
                                    required>

                            </div>

                            <!-- PHOTOGRAPHER ID -->
                            <div class="col-md-6">

                                <label
                                    for="photographer_id"
                                    class="form-label">
                                    Photographer ID
                                </label>

                                <input
                                    type="number"
                                    id="photographer_id"
                                    name="photographer_id"
                                    class="form-control"
                                    min="1"
                                    placeholder="Enter photographer ID"
                                    required>

                            </div>

                            <!-- RATING -->
                            <div class="col-12">

                                <label
                                    for="rating"
                                    class="form-label">
                                    Your Rating
                                </label>

                                <select
                                    id="rating"
                                    name="rating"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Select Rating
                                    </option>

                                    <option value="5">5 Stars ★★★★★</option>
                                    <option value="4">4 Stars ★★★★☆</option>
                                    <option value="3">3 Stars ★★★☆☆</option>
                                    <option value="2">2 Stars ★★☆☆☆</option>
                                    <option value="1">1 Star ★☆☆☆☆</option>

                                </select>

                                <div class="form-text">
                                    Choose a rating from 1 to 5 stars.
                                </div>

                            </div>

                            <!-- COMMENT -->
                            <div class="col-12">

                                <label
                                    for="comment"
                                    class="form-label">
                                    Your Experience (Optional)
                                </label>

                                <textarea
                                    id="comment"
                                    name="comment"
                                    class="form-control"
                                    rows="5"
                                    maxlength="1000"
                                    placeholder="Tell us about the moments you loved..."></textarea>

                            </div>

                        </div>

                        <div class="form-divider"></div>

                        <!-- BUTTONS -->
                        <div class="d-flex flex-wrap gap-3 align-items-center">

                            <button
                                type="button"
                                class="btn btn-brown"
                                disabled>
                                Submit Review ↗
                            </button>

                            <a
                                href="{{ url('/reviews') }}"
                                class="btn-outline-brown">
                                Back to Reviews
                            </a>

                        </div>

                        <div class="notice mt-4">
                            ✦ Reviews can be submitted only
                            after a photography session is completed.
                            This form is currently a preview
                            and does not save any review.
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>

    <!-- RIBBON -->
    <div class="ribbon">

        <span>✦ Capturing the little things</span>
        <span>✳ Real stories, real moments</span>
        <span>✦ Memories made beautifully</span>
        <span>✳ Capturing the little things</span>
        <span>✦ Real stories, real moments</span>

    </div>

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
