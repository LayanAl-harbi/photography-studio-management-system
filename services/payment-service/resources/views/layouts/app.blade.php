<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Atelier Frame — Photography Studio')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="--bs-body-bg:#faf7f1; --bs-body-color:#34241e; --bs-body-font-family:'DM Sans',sans-serif;">

  <!-- Shared Navigation Bar Across All Pages -->
  <nav class="navbar navbar-expand-lg border-bottom px-4 px-md-5 py-3" style="background-color:#c9def6; border-color:#583522 !important; min-height:80px;">
    <div class="container-fluid px-0">
      <a href="{{ url('/home') }}" class="navbar-brand text-decoration-none py-0">
        <span class="d-block fst-italic lh-1" style="font-family:'Playfair Display',Georgia,serif; font-size:29px; color:#583522;">Atelier Frame</span>
        <span class="d-block fw-semibold text-uppercase mt-1" style="font-size:9px; letter-spacing:3px; color:#463a35;">PHOTOGRAPHY STUDIO</span>
      </a>
      <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="mainNav">
        <ul class="navbar-nav align-items-lg-center gap-lg-3 mt-3 mt-lg-0">
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/home#insights') }}">Studio Insights</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/home#photographers') }}">Photographers</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/home#packages') }}">Packages</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/home#reviews') }}">Client Reviews</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-uppercase small" style="letter-spacing:1.2px; color:#463a35;" href="{{ url('/') }}">Cart</a></li>
          <li class="nav-item" id="authLoginItem">
            <a class="btn btn-sm rounded-0 fw-bold text-uppercase px-3 py-2" style="background-color:#fffcf8; border:1px solid #816451; color:#463a35; letter-spacing:1px; font-size:11px;" href="http://127.0.0.1:8002/login">LOG IN ↗</a>
          </li>
          <li class="nav-item d-none" id="authLogoutItem">
            <a class="btn btn-sm rounded-0 fw-bold text-uppercase px-3 py-2" style="background-color:#583522; border:1px solid #583522; color:#fffcf8; letter-spacing:1px; font-size:11px;" href="http://127.0.0.1:8002/logout">LOG OUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page-Specific Content -->
  @yield('content')

  <!-- Shared Powder Blue Footer -->
  <footer class="border-top border-2 px-4 py-5 text-center mt-auto" style="background-color:#c9def6; border-color:#583522 !important;">
    <a class="text-decoration-none d-inline-block" href="{{ url('/home') }}">
      <span class="d-block fst-italic lh-1" style="font-family:'Playfair Display',Georgia,serif; font-size:33px; color:#583522;">Atelier Frame</span>
      <span class="d-block fw-semibold text-uppercase mt-2" style="font-size:9px; letter-spacing:3px; color:#463a35;">PHOTOGRAPHY STUDIO</span>
    </a>
    <p class="mt-3 mb-1" style="color:#34241e;">A little bit of magic in every frame.</p>
    <div class="small" style="color:#6b5a4e;">Photography Studio Management System · CS383 Group 5</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function checkAuthNav() {
      const hasToken = localStorage.getItem('token') || localStorage.getItem('auth_token') || sessionStorage.getItem('token');
      if (hasToken) {
        document.getElementById('authLoginItem').classList.add('d-none');
        document.getElementById('authLogoutItem').classList.remove('d-none');
      }
    })();
  </script>
  @yield('scripts')
</body>
</html>