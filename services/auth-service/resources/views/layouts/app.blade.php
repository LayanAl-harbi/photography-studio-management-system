
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Atelier Frame')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap"
          rel="stylesheet">

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

        .site {
            max-width: 1160px;
            min-height: 100vh;
            margin: 34px auto;
            background: var(--cream);
            box-shadow: 0 20px 70px #321e152b;
            overflow: hidden;
        }

        /* Navbar */
        .site-navbar {
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

        /* Main Content */
        .main-content {
            min-height: 65vh;
            padding: 60px 7%;
        }

        /* Typography */
        .eyebrow {
            font-size: 10px;
            letter-spacing: 2.8px;
            text-transform: uppercase;
            font-weight: 700;
            color: #927460;
        }

        /* Buttons */
        .btn-brown {
            background: var(--brown);
            color: white;
            border-radius: 30px;
            padding: 12px 26px;
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
            padding: 12px 26px;
            font-size: 12px;
        }

        .btn-outline-brown:hover {
            background: #f2e5d7;
            color: var(--brown);
        }

        /* Cards */
        .studio-card {
            background: #fffaf4;
            border: 1px solid var(--line);
            box-shadow: 7px 7px 0 #dfd0bf;
        }

        /* Forms */
        .form-control,
        .form-select {
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

        /* Alerts */
        .alert {
            border-radius: 0;
            font-size: 13px;
        }

        /* Footer */
        .site-footer {
            background: var(--blue);
            padding: 35px 7%;
            text-align: center;
            color: var(--brown);
        }

        .site-footer .brand {
            font-size: 30px;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .site {
                margin: 0;
            }

            .main-content {
                padding: 40px 6%;
            }

            .site-navbar {
                padding: 16px 6%;
            }
        }
    </style>
</head>

<body>

    <div class="site">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg site-navbar">
            <div class="container-fluid p-0">

                <a href="/" class="brand">
                    Atelier Frame
                    <small>PHOTOGRAPHY STUDIO</small>
                </a>

                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                    <ul class="navbar-nav align-items-lg-center gap-lg-3 mt-3 mt-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="{{ route('register') }}">
                                Get Started
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>

        <!-- Page Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="site-footer">
            <a href="/" class="brand d-inline-block">
                Atelier Frame
                <small>PHOTOGRAPHY STUDIO</small>
            </a>

            <p class="mt-3 mb-1">
                A little bit of magic in every frame.
            </p>

            <div class="small mt-2">
                Authentication & Roles Service · CS383 Group 5
            </div>
        </footer>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
