<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Atelier Frame — Studio Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="--bs-body-bg:#faf7f1; --bs-body-color:#34241e; --bs-body-font-family:'DM Sans',sans-serif;">

  <!-- Cream Header Banner -->
  <header class="border-bottom px-4 px-md-5 py-4" style="background-color:#fffcf8; border-color:#dfd0bf !important;">
    <div class="container-fluid px-0 d-flex flex-wrap justify-content-between align-items-end gap-3">
      <div>
        <div class="text-uppercase fw-bold small mb-1" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">ATELIER FRAME · ANALYTICS &amp; INSIGHTS</div>
        <h1 class="display-5 mb-0" style="font-family:'Playfair Display',serif; color:#583522;">Studio <em style="color:#8c5c43;">dashboard</em></h1>
      </div>
      <div class="text-end">
        <span id="dataSourceBadge" class="badge rounded-0 mb-1" style="background-color:#583522;">SYNCING...</span>
        <p class="small mb-0" style="color:#6e5b4f;">Overview of booking counts, popular packages, photographers &amp; peak studio hours.</p>
      </div>
    </div>
  </header>

  <!-- Main Content: All 6 Dashboards -->
  <main class="container-fluid px-4 px-md-5 py-5 flex-grow-1">
    <div class="row g-4">

      <!-- 1. Booking Summary -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#f0e5d7; border-color:#583522; box-shadow:5px 5px 0 #583522;">
          <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">01 · BOOKING SUMMARY</div>
          <h5 class="h4 mb-4 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Studio Bookings Overview</h5>

          <div class="row g-3 text-center">
            <div class="col-4">
              <div class="p-3 bg-white border" style="border-color:#cbbba8 !important;">
                <div class="h2 fw-bold mb-0" style="font-family:'Playfair Display',serif; color:#583522;" id="statTotal">48</div>
                <div class="small text-secondary fw-semibold">Total</div>
              </div>
            </div>
            <div class="col-4">
              <div class="p-3 bg-white border" style="border-color:#cbbba8 !important;">
                <div class="h2 fw-bold mb-0 text-warning" id="statPending">11</div>
                <div class="small text-secondary fw-semibold">Pending</div>
              </div>
            </div>
            <div class="col-4">
              <div class="p-3 bg-white border" style="border-color:#cbbba8 !important;">
                <div class="h2 fw-bold mb-0 text-success" id="statCompleted">37</div>
                <div class="small text-secondary fw-semibold">Completed</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Most Requested Times -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:5px 5px 0 #c9def6;">
          <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">02 · PEAK DEMAND</div>
          <h5 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Requested Times</h5>
          <ul class="list-group list-group-flush" id="requestedTimesList"></ul>
        </div>
      </div>

      <!-- 3. Most Booked Photographer -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:5px 5px 0 #c9def6;">
          <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">03 · TOP PERFORMER</div>
          <h5 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Booked Photographer</h5>

          <div class="p-4 border d-flex justify-content-between align-items-center" style="background-color:#e9f1f9; border-color:#583522 !important;">
            <div>
              <div class="h4 fw-bold mb-1" style="color:#583522;" id="topPhName">Lina Carter</div>
              <div class="small text-secondary">Average Client Rating: <strong id="topPhRating">4.9 ★</strong></div>
            </div>
            <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="topPhCount">22 Bookings</span>
          </div>
        </div>
      </div>

      <!-- 4. Most Popular Package -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:5px 5px 0 #c9def6;">
          <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">04 · CLIENT FAVORITE</div>
          <h5 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Popular Package</h5>

          <div class="p-4 border d-flex justify-content-between align-items-center" style="background-color:#faf7f1; border-color:#cbbba8 !important;">
            <div>
              <div class="h4 fw-bold mb-1" style="color:#583522;" id="topPkgName">Graduation Photography</div>
              <div class="small text-secondary">Starting at <strong id="topPkgPrice">$180.00</strong></div>
            </div>
            <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="topPkgCount">18 Orders</span>
          </div>
        </div>
      </div>

      <!-- 5. Packages Card & Chart -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:5px 5px 0 #c9def6;">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">05 · CATALOG OVERVIEW</div>
              <h5 class="h4 mb-0 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Photography Packages</h5>
            </div>
            <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="activePkgBadge">4 Active</span>
          </div>
          <div id="packagesChartContainer"></div>
        </div>
      </div>

      <!-- 6. Photographers Card & Chart -->
      <div class="col-lg-6">
        <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:5px 5px 0 #c9def6;">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">06 · STUDIO TEAM</div>
              <h5 class="h4 mb-0 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Photographers Activity</h5>
            </div>
            <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="staffCountBadge">3 Staff</span>
          </div>
          <div id="photographersChartContainer"></div>
        </div>
      </div>

    </div>
  </main>

  <!-- Centered Powder Blue Footer -->
  <footer class="border-top border-2 px-4 py-4 text-center" style="background-color:#c9def6; border-color:#583522 !important;">
    <div style="font-family:'Playfair Display',serif; font-style:italic; font-size:26px; color:#583522; line-height:1;">Atelier Frame</div>
    <div class="fw-bold text-uppercase mt-1" style="font-size:9px; letter-spacing:3px; color:#463a35;">PHOTOGRAPHY STUDIO</div>
    <div class="mt-3 mb-1" style="font-size:13px; color:#34241e;">A little bit of magic in every frame.</div>
    <div class="small" style="color:#6e5b4f;">Payments &amp; Dashboard Service · CS383 Group 5</div>
  </footer>

<script>
  const fallbackStats = {
    source: 'placeholder',
    booking_summary: { total: 48, pending: 11, completed: 37 },
    requested_times: [
      { slot: '4:00 PM – 6:00 PM (Golden Hour)', count: 21 },
      { slot: '10:00 AM – 12:00 PM (Morning)', count: 15 },
      { slot: '2:00 PM – 4:00 PM (Afternoon)', count: 12 }
    ],
    top_photographer: { name: 'Lina Carter', sessions: 22, rating: '4.9 ★' },
    popular_package: { name: 'Graduation Photography', price: '$180.00', count: 18 },
    packages: [
      { name: 'Graduation Photography', count: 18, percent: 90 },
      { name: 'Portrait Photography', count: 14, percent: 70 },
      { name: 'Family Photography', count: 10, percent: 50 },
      { name: 'Product Photography', count: 6, percent: 30 }
    ],
    active_packages: 4,
    photographers: [
      { name: 'Lina Carter', sessions: 22, percent: 88 },
      { name: 'Amelia Rose', sessions: 16, percent: 64 },
      { name: 'Sarah Nabil', sessions: 10, percent: 40 }
    ],
    staff_count: 3
  };

  function renderDashboard(data) {
    document.getElementById('dataSourceBadge').textContent =
      data.source === 'live' ? 'CONNECTED TO MICROSERVICES ✓' : 'PREVIEW DATA (WAITING FOR SERVICES 8001–8003)';

    document.getElementById('statTotal').textContent = data.booking_summary.total;
    document.getElementById('statPending').textContent = data.booking_summary.pending;
    document.getElementById('statCompleted').textContent = data.booking_summary.completed;

    document.getElementById('requestedTimesList').innerHTML = data.requested_times.map(t => `
      <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center bg-transparent" style="border-color:#dfd0bf;">
        <span class="fw-semibold">${t.slot}</span>
        <span class="badge rounded-pill px-3 py-2" style="background-color:#583522;">${t.count} bookings</span>
      </li>
    `).join('');

    document.getElementById('topPhName').textContent = data.top_photographer.name;
    document.getElementById('topPhRating').textContent = data.top_photographer.rating;
    document.getElementById('topPhCount').textContent = `${data.top_photographer.sessions} Bookings`;

    document.getElementById('topPkgName').textContent = data.popular_package.name;
    document.getElementById('topPkgPrice').textContent = data.popular_package.price;
    document.getElementById('topPkgCount').textContent = `${data.popular_package.count} Orders`;

    document.getElementById('activePkgBadge').textContent = `${data.active_packages} Active`;
    document.getElementById('packagesChartContainer').innerHTML = data.packages.map(p => `
      <div class="mb-3">
        <div class="d-flex justify-content-between small fw-semibold mb-1">
          <span>${p.name}</span>
          <span style="color:#583522;">${p.count} bookings</span>
        </div>
        <div class="progress rounded-0" style="height:10px; background-color:#f0e5d7;">
          <div class="progress-bar" style="width:${p.percent}%; background-color:#583522;"></div>
        </div>
      </div>
    `).join('');

    document.getElementById('staffCountBadge').textContent = `${data.staff_count} Staff`;
    document.getElementById('photographersChartContainer').innerHTML = data.photographers.map(ph => `
      <div class="mb-3">
        <div class="d-flex justify-content-between small fw-semibold mb-1">
          <span>${ph.name}</span>
          <span style="color:#583522;">${ph.sessions} sessions</span>
        </div>
        <div class="progress rounded-0" style="height:10px; background-color:#f0e5d7;">
          <div class="progress-bar" style="width:${ph.percent}%; background-color:#8c5c43;"></div>
        </div>
      </div>
    `).join('');
  }

  async function loadDashboard() {
    renderDashboard(fallbackStats);
    try {
      const res = await fetch('/api/dashboard/stats', { headers: { 'Accept': 'application/json' } });
      if (res.ok) {
        const liveData = await res.json();
        renderDashboard(liveData);
      }
    } catch (_) {}
  }

  loadDashboard();
</script>
</body>
</html>