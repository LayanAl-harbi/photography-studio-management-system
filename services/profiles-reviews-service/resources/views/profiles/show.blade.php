
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atelier Frame — User Profile</title>

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
            min-height: 100vh;
            background: var(--cream);
            overflow: hidden;
            display: flex;
            flex-direction: column;
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

        .profile-section {
            flex: 1;
            padding: 75px 7%;
            background: #fffcf8;
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
            max-width: 530px;
        }

        .profile-layout {
            max-width: 1120px;
            margin: 45px auto 0;
        }

        .profile-sidebar {
            background: #c9def6;
            padding: 35px 25px;
            height: 100%;
            text-align: center;
        }

        .profile-avatar {
            width: 125px;
            height: 125px;
            border-radius: 50%;
            background: #faf7f1;
            border: 5px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            box-shadow: 0 8px 22px #58352220;
            overflow: hidden;
        }

        .profile-avatar svg {
            width: 70px;
            height: 70px;
            color: var(--brown);
        }

        .profile-name {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 30px;
            color: var(--brown);
            margin-bottom: 8px;
        }

        .profile-label {
            font-size: 11px;
            letter-spacing: 1.5px;
            color: #6b5a4e;
            font-weight: 700;
            text-transform: uppercase;
        }

        .profile-id {
            display: inline-block;
            background: #faf7f1;
            border-radius: 20px;
            padding: 8px 16px;
            color: var(--brown);
            font-size: 12px;
            font-weight: 600;
            margin-top: 18px;
        }

        .profile-card {
            background: #fffaf4;
            border: 1px solid #e8d9cb;
            padding: 35px;
            box-shadow: 7px 7px 0 #dfd0bf;
            height: 100%;
        }

        .card-kicker {
            font-size: 10px;
            letter-spacing: 2.8px;
            text-transform: uppercase;
            font-weight: 700;
            color: #927460;
        }

        .card-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 34px;
            color: var(--brown);
            margin-top: 10px;
            margin-bottom: 28px;
        }

        .info-item {
            background: white;
            border: 1px solid var(--line);
            padding: 18px 20px;
            margin-bottom: 17px;
        }

        .info-label {
            font-size: 11px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            font-weight: 700;
            color: #927460;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 15px;
            color: var(--ink);
            overflow-wrap: anywhere;
        }

        .empty-profile {
            background: #e8f1fb;
            border-left: 3px solid #9abedc;
            padding: 18px;
            color: #574a42;
            font-size: 13px;
            line-height: 1.8;
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
            transition: background .2s;
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

        .decorative-note {
            background: #f0e5d7;
            padding: 25px;
            text-align: center;
            margin-top: 28px;
            transform: rotate(-1deg);
            box-shadow: 0 7px 15px #2a170f15;
        }

        .decorative-note p {
            font-family: 'Playfair Display', Georgia, serif;
            font-style: italic;
            font-size: 21px;
            color: var(--brown);
            margin: 0;
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
            .profile-section {
                padding: 55px 6%;
            }
        }

        @media (max-width: 767px) {
            .profile-section {
                padding: 45px 6%;
            }

            .section-title {
                font-size: 42px;
            }

            .profile-layout {
                margin-top: 30px;
            }

            .profile-sidebar {
                padding: 30px 20px;
            }

            .profile-card {
                padding: 22px;
            }

            .card-title {
                font-size: 29px;
            }

            .info-item {
                padding: 15px;
            }

            .decorative-note p {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

<div class="site">

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
                            My Profile
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

    <!-- USER PROFILE -->
    <main class="profile-section">

        <div class="text-center">

            <div class="eyebrow mb-3">
                YOUR PERSONAL SPACE ✦
            </div>

            <h1 class="section-title">
                My <em>Profile.</em>
            </h1>

            <p class="section-intro mx-auto mt-3">
                A little space just for you.
                View your personal details and keep your information
                ready for your next beautiful photography session.
            </p>

        </div>

        <div class="profile-layout">

            <div class="row g-4 align-items-stretch">

                <!-- LEFT SIDE -->
                <div class="col-lg-4">

                    <div class="profile-sidebar">

                        <div class="profile-avatar">
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

                        <div class="profile-label">
                            ATELIER FRAME MEMBER
                        </div>

                        <h2 class="profile-name mt-2">
                            My Profile
                        </h2>

                        <p style="color:#6b5a4e;line-height:1.8;">
                            Every beautiful story begins with you.
                        </p>

                        <div class="profile-id">
                            Member ID: {{ $id }}
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="col-lg-8">

                    <div class="profile-card">

                        <div class="card-kicker">
                            ✦ PERSONAL INFORMATION
                        </div>

                        <h2 class="card-title">
                            Your Details
                        </h2>

                        @if($profile)

                            <div class="info-item">

                                <div class="info-label">
                                    User ID
                                </div>

                                <div class="info-value">
                                    {{ $id }}
                                </div>

                            </div>

                            <div class="info-item">

                                <div class="info-label">
                                    Phone Number
                                </div>

                                <div class="info-value">
                                    {{ $profile->phone ?: 'Not provided' }}
                                </div>

                            </div>

                            <div class="info-item">

                                <div class="info-label">
                                    Address
                                </div>

                                <div class="info-value">
                                    {{ $profile->address ?: 'Not provided' }}
                                </div>

                            </div>

                        @else

                            <div class="empty-profile">
                                ✦ No profile information available yet.
                                Your details will appear here once
                                your profile has been created.
                            </div>

                        @endif

                        <div class="d-flex flex-wrap gap-2 mt-4">

                            <a
                                href="{{ url('/reviews') }}"
                                class="btn-brown">
                                Back to Home →
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DECORATIVE NOTE -->
            <div class="decorative-note">

                <p>
                    "Your moments, your memories, your story."
                </p>

            </div>

        </div>

    </main>

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
