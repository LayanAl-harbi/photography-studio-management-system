
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Atelier Frame — Edit Profile</title>

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

        /* Page heading */

        .edit-section {
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

        /* Layout */

        .edit-layout {
            max-width: 1120px;
            margin: 45px auto 0;
        }

        .edit-sidebar {
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
        }

        .profile-avatar svg {
            width: 70px;
            height: 70px;
            color: var(--brown);
        }

        .sidebar-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 30px;
            color: var(--brown);
            margin-bottom: 12px;
        }

        .sidebar-text {
            color: #6b5a4e;
            line-height: 1.8;
            font-size: 13px;
        }

        .sidebar-label {
            font-size: 11px;
            letter-spacing: 1.5px;
            color: #6b5a4e;
            font-weight: 700;
            text-transform: uppercase;
        }

        .sidebar-note {
            background: #faf7f1;
            padding: 18px;
            margin-top: 30px;
            color: var(--brown);
            font-family: 'Playfair Display', Georgia, serif;
            font-style: italic;
            font-size: 18px;
            line-height: 1.6;
            transform: rotate(-2deg);
        }

        /* Edit form */

        .form-panel {
            background: #fffaf4;
            border: 1px solid #e8d9cb;
            padding: 35px;
            box-shadow: 7px 7px 0 #dfd0bf;
            height: 100%;
        }

        .form-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 34px;
            color: var(--brown);
            margin-top: 10px;
            margin-bottom: 12px;
        }

        .form-description {
            color: #85756a;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #583522;
            margin-bottom: 9px;
        }

        .form-control {
            border: 1px solid #d9c9b9;
            border-radius: 0;
            font-size: 13px;
            min-height: 48px;
            padding: 12px 15px;
            background: #fffdf8;
            color: var(--ink);
        }

        .form-control:focus {
            border-color: #806b5d;
            box-shadow: 0 0 0 .15rem #b5d6ee60;
            background: white;
        }

        .form-control::placeholder {
            color: #a9988a;
        }

        .form-text {
            color: #927e70;
            font-size: 11px;
            margin-top: 7px;
        }

        .form-divider {
            border-top: 1px solid #e8d9cb;
            margin: 30px 0;
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
            text-decoration: none;
            display: inline-block;
        }

        .btn-brown:hover {
            background: #79513b;
            color: white;
        }

        .btn-brown:disabled {
            background: var(--brown);
            color: white;
            border-color: var(--brown);
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

        .notice {
            background: #e8f1fb;
            border-left: 3px solid #9abedc;
            padding: 15px 18px;
            color: #574a42;
            font-size: 12px;
            line-height: 1.8;
            margin-top: 25px;
        }

        /* Decorative note */

        .decorative-note {
            background: #f0e5d7;
            padding: 25px;
            text-align: center;
            margin-top: 35px;
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
            .edit-section {
                padding: 55px 6%;
            }
        }

        @media (max-width: 767px) {
            .edit-section {
                padding: 45px 6%;
            }

            .section-title {
                font-size: 42px;
            }

            .edit-layout {
                margin-top: 30px;
            }

            .edit-sidebar {
                padding: 30px 20px;
            }

            .form-panel {
                padding: 22px;
            }

            .form-title {
                font-size: 29px;
            }

            .form-control {
                min-height: 45px;
            }

            .decorative-note p {
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
                            Edit Profile
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link nav-btn"
                            href="{{ url('/reviews') }}#write-review">
                            RATE YOUR SESSION ↗
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- PAGE CONTENT -->
    <main class="edit-section">

        <!-- HEADER -->
        <div class="text-center">

            <div class="eyebrow mb-3">
                YOUR PERSONAL SPACE ✦
            </div>

            <h1 class="section-title">
                Edit <em>Profile.</em>
            </h1>

            <p class="section-intro mx-auto mt-3">
                Make your personal space feel like you.
                Keep your information updated and ready
                for your next beautiful photography session.
            </p>

        </div>

        <div class="edit-layout">

            <div class="row g-4 align-items-stretch">

                <!-- LEFT SIDEBAR -->
                <div class="col-lg-4">

                    <div class="edit-sidebar">

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

                        <div class="sidebar-label">
                            ATELIER FRAME MEMBER
                        </div>

                        <h2 class="sidebar-title mt-2">
                            Your Details
                        </h2>

                        <p class="sidebar-text">
                            Your profile is part of your story.
                            Keep your details in one beautiful place.
                        </p>

                        <div class="sidebar-note">
                            "Every beautiful story begins with you."
                        </div>

                    </div>

                </div>

                <!-- RIGHT FORM -->
                <div class="col-lg-8">

                    <div class="form-panel">

                        <div class="eyebrow">
                            ✦ PERSONAL INFORMATION
                        </div>

                        <h2 class="form-title">
                            Update Your Profile
                        </h2>

                        <p class="form-description">
                            Review your contact information below.
                            Profile updates will be available
                            after authentication integration.
                        </p>

                        <form>

                            <!-- PHONE -->
                            <div class="mb-4">

                                <label
                                    for="phone"
                                    class="form-label">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    class="form-control"
                                    maxlength="20"
                                    placeholder="Enter your phone number">

                            </div>

                            <!-- ADDRESS -->
                            <div class="mb-4">

                                <label
                                    for="address"
                                    class="form-label">
                                    Address
                                </label>

                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    class="form-control"
                                    maxlength="255"
                                    placeholder="Enter your address">

                            </div>

                            <!-- PROFILE IMAGE -->
                            <div class="mb-4">

                                <label
                                    for="profile_image"
                                    class="form-label">
                                    Profile Image Path
                                </label>

                                <input
                                    type="text"
                                    id="profile_image"
                                    name="profile_image"
                                    class="form-control"
                                    maxlength="255"
                                    placeholder="Enter your profile image path">

                                <div class="form-text">
                                    Image path will be used when
                                    profile updates are enabled.
                                </div>

                            </div>

                            <div class="form-divider"></div>

                            <!-- ACTIONS -->
                            <div class="d-flex flex-wrap gap-3 align-items-center">

                                <button
                                    type="button"
                                    class="btn btn-brown"
                                    disabled>
                                    Save Changes ↗
                                </button>

                                <a
                                    href="{{ url('/reviews') }}"
                                    class="btn-outline-brown">
                                    Back to Home
                                </a>

                            </div>

                        </form>

                        <!-- INTEGRATION NOTICE -->
                        <div class="notice">
                            ✦ Profile editing will be enabled
                            after authentication integration.
                            Your information cannot be saved
                            from this preview yet.
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

        <a
            class="brand d-inline-block"
            href="{{ url('/reviews') }}">
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
