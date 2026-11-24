@extends('layouts.app')

@section('title', 'Atelier Frame — Photography Studio')

@section('content')
  <!-- Hero Section -->
  <header class="px-4 px-md-5 py-5" style="background-color:#fffcf8;" id="top">
    <div class="container-fluid px-0 py-lg-4">
      <div class="row align-items-center gy-5">
        <div class="col-lg-6">
          <div class="text-uppercase fw-bold mb-3" style="letter-spacing:3px; font-size:12px; color:#927460;">WELCOME TO ATELIER FRAME ✦</div>
          <h1 class="display-2 fw-normal mb-4" style="font-family:'Playfair Display',serif; color:#583522; line-height:1.06; letter-spacing:-1.5px;">
            Every frame <em style="color:#9d7b69;">tells a beautiful story.</em>
          </h1>
          <p class="fs-5 mb-5" style="max-width:540px; line-height:1.85; color:#6e5b4f;">
            Browse curated photography packages, meet our studio artists, explore live studio insights, and book your next memorable session effortlessly.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="{{ url('/') }}" class="btn rounded-pill px-5 py-3 fw-semibold fs-6" style="background-color:#583522; color:#fff;">Book a Session →</a>
            <a href="#insights" class="btn rounded-pill px-5 py-3 fw-semibold fs-6" style="border:1px solid #a58c7d; color:#583522;">Explore Studio Stats</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="position-relative d-flex justify-content-center align-items-center py-3">
            <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=850&q=85&auto=format&fit=crop" alt="Photographer" class="img-fluid border border-5 border-white shadow-lg" style="width:76%; height:360px; object-fit:cover; transform:rotate(-3deg);">
            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=85&auto=format&fit=crop" alt="Wedding" class="img-fluid border border-5 border-white shadow position-absolute end-0 bottom-0" style="width:43%; height:190px; object-fit:cover; transform:rotate(6deg);">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Seamless Full-Width Looping Ribbon -->
  <div class="border-top border-bottom py-3 overflow-hidden" style="background-color:#f2e7db; border-color:#e1d3c4 !important; color:#6e5142; font-family:Georgia,serif; font-style:italic;">
    <div id="ribbonTrack" class="d-flex text-nowrap fs-5">
      <div class="d-flex flex-shrink-0 align-items-center">
        <span class="mx-4">✦ Capturing the little things</span>
        <span class="mx-4">✳ Real stories, real moments</span>
        <span class="mx-4">✦ Memories made beautifully</span>
        <span class="mx-4">✳ Portraits · Graduation · Family · Product</span>
      </div>
    </div>
  </div>

  <!-- SECTION 1: STUDIO INSIGHTS -->
  <section class="px-4 px-md-5 py-5" id="insights">
    <div class="container-fluid px-0 py-3">
      <div class="mb-5">
        <div class="text-uppercase fw-bold small mb-2" style="letter-spacing:2.5px; font-size:10px; color:#927460;">STUDIO PULSE &amp; HIGHLIGHTS</div>
        <h2 class="display-5 mb-0" style="font-family:'Playfair Display',serif; color:#583522;">Live studio <em style="color:#8c5c43;">overview</em></h2>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#f0e5d7; border-color:#583522; box-shadow:6px 6px 0 #583522;">
            <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">01 · BOOKING SUMMARY</div>
            <h3 class="h4 mb-4 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Studio Bookings Overview</h3>
            <div class="row g-3 text-center mt-auto">
              <div class="col-4"><div class="p-3 bg-white border"><div class="h2 fw-bold mb-0" style="font-family:'Playfair Display',serif; color:#583522;" id="statTotal">48</div><div class="small text-secondary fw-semibold">Total</div></div></div>
              <div class="col-4"><div class="p-3 bg-white border"><div class="h2 fw-bold mb-0 text-warning" id="statPending">11</div><div class="small text-secondary fw-semibold">Pending</div></div></div>
              <div class="col-4"><div class="p-3 bg-white border"><div class="h2 fw-bold mb-0 text-success" id="statCompleted">37</div><div class="small text-secondary fw-semibold">Completed</div></div></div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
            <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">02 · PEAK DEMAND</div>
            <h3 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Requested Times</h3>
            <ul class="list-group list-group-flush" id="requestedTimesList"></ul>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
            <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">03 · TOP PERFORMER</div>
            <h3 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Booked Photographer</h3>
            <div class="p-4 border d-flex justify-content-between align-items-center mt-auto" style="background-color:#e9f1f9; border-color:#583522 !important;">
              <div><div class="h4 fw-bold mb-1" style="color:#583522;" id="topPhName">Lina Carter</div><div class="small text-secondary">Average Rating: <strong id="topPhRating">4.9 ★</strong></div></div>
              <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="topPhCount">22 Bookings</span>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
            <div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">04 · CLIENT FAVORITE</div>
            <h3 class="h4 mb-3 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Most Popular Package</h3>
            <div class="p-4 border d-flex justify-content-between align-items-center mt-auto" style="background-color:#faf7f1; border-color:#cbbba8 !important;">
              <div><div class="h4 fw-bold mb-1" style="color:#583522;" id="topPkgName">Graduation Photography</div><div class="small text-secondary">Starting at <strong id="topPkgPrice">$180.00</strong></div></div>
              <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="topPkgCount">18 Orders</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 2: PHOTOGRAPHERS -->
  <section class="px-4 px-md-5 py-5 border-top border-bottom" style="background-color:#e9f1f9; border-color:#d4e2f0 !important;" id="photographers">
    <div class="container-fluid px-0 py-3">
      <div class="text-center mb-5">
        <div class="text-uppercase fw-bold mb-2" style="letter-spacing:3px; font-size:12px; color:#927460;">MEET YOUR CREATIVE TEAM</div>
        <h2 class="display-3 fw-normal" style="font-family:'Playfair Display',serif; color:#583522;">Behind <em style="color:#8c5c43;">the lens</em></h2>
        <p class="mx-auto mt-3 fs-5" style="color:#6e5b4f; max-width:650px;">Every photographer brings a signature eye. Discover their specialties and live session activity.</p>
      </div>

      <div class="row g-4 align-items-stretch">
        <div class="col-lg-8"><div class="row g-3 h-100" id="photographerGrid"></div></div>
        <div class="col-lg-4">
          <div class="card rounded-0 border-2 h-100 p-4" style="background-color:#fffcf8; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div><div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">06 · STUDIO TEAM</div><h3 class="h4 mb-0 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Photographers Activity</h3></div>
              <span class="badge rounded-0 px-2 py-2" style="background-color:#583522;" id="staffCountBadge">3 Staff</span>
            </div>
            <p class="small text-secondary mb-4">Completed &amp; scheduled sessions per artist.</p>
            <div id="photographersChartContainer" class="my-auto"></div>
            <div class="pt-3 mt-3 border-top"><a href="{{ url('/') }}" class="fw-bold text-decoration-none small border-bottom pb-1" style="color:#4f3324;">Reserve a photographer →</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3: PACKAGES -->
  <section class="px-4 px-md-5 py-5" id="packages">
    <div class="container-fluid px-0 py-3">
      <div class="row g-5 align-items-center">
        <div class="col-lg-5">
          <div class="text-uppercase fw-bold mb-2" style="letter-spacing:3px; font-size:12px; color:#927460;">CURATED SESSIONS</div>
          <h2 class="display-3 fw-normal" style="font-family:'Playfair Display',serif; color:#583522; line-height:1.08;">Signature <em style="color:#8c5c43;">packages</em></h2>
          <p class="mt-4 fs-5" style="color:#6e5b4f; line-height:1.8;">Each package includes high-resolution edited frames and personalized studio guidance.</p>
          <a href="{{ url('/') }}" class="btn rounded-pill px-5 py-3 fw-semibold fs-6 mt-3" style="background-color:#583522; color:#fff;">Select Package &amp; Book →</a>
        </div>
        <div class="col-lg-7">
          <div class="card rounded-0 border-2 p-4 p-md-5" style="background-color:#fffcf8; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div><div class="text-uppercase fw-bold" style="font-size:10px; letter-spacing:2px; color:#856d5c;">05 · CATALOG OVERVIEW</div><h3 class="h4 mb-0 mt-1" style="font-family:'Playfair Display',serif; color:#583522;">Photography Packages Popularity</h3></div>
              <span class="badge rounded-0 fs-6 px-3 py-2" style="background-color:#583522;" id="activePkgBadge">4 Active</span>
            </div>
            <div id="packagesChartContainer"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 4: CLIENT REVIEWS -->
  <section class="px-4 px-md-5 py-5 border-top" style="background-color:#f9f2dc; border-color:#e1d3c4 !important;" id="reviews">
    <div class="container py-3">
      <div class="text-center">
        <div class="text-uppercase fw-bold mb-2" style="letter-spacing:3px; font-size:13px; color:#583522;">LITTLE LOVE LETTERS</div>
        <h2 class="display-1 fw-bold mb-3" style="color:#583522; letter-spacing:-2px; line-height:1;">KIND <em class="fw-normal" style="font-family:'Playfair Display',serif; color:#91715e;">words</em> ✎</h2>
        <p class="mx-auto fs-5" style="color:#493a31; max-width:650px;">Real thoughts from happy clients — the best part of our day!</p>
      </div>
      <div class="row justify-content-center g-2 my-4 mx-auto" style="max-width:580px;">
        <div class="col-md-7"><select id="reviewFilter" class="form-select rounded-1 border-2" style="border-color:#735b49;"><option value="all">All photographers</option></select></div>
        <div class="col-md-4"><select id="starFilter" class="form-select rounded-1 border-2" style="border-color:#735b49;"><option value="all">All ratings</option><option value="5">5 stars</option><option value="4">4 stars</option><option value="3">3 stars</option></select></div>
      </div>
      <div class="row g-4" id="reviewGrid"></div>
    </div>
  </section>
@endsection

@section('scripts')
<script>
const track = document.getElementById('ribbonTrack');
track.appendChild(track.firstElementChild.cloneNode(true));
let rx = 0;
(function moveRibbon() {
  rx = Math.abs(rx) >= track.firstElementChild.offsetWidth ? 0 : rx - 0.8;
  track.style.transform = `translateX(${rx}px)`;
  requestAnimationFrame(moveRibbon);
})();

let photographers = [
  {id:1, name:'Lina Carter', specialty:'Portraits & Graduation', image:'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=700&q=85&auto=format&fit=crop', bg:'#f0e3d5'},
  {id:2, name:'Amelia Rose', specialty:'Weddings & Celebrations', image:'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=700&q=85&auto=format&fit=crop', bg:'#c9dff4'},
  {id:3, name:'Sarah Nabil', specialty:'Lifestyle & Family', image:'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=700&q=85&auto=format&fit=crop', bg:'#dcc6ac'}
];
let reviews = [
  {name:'Sophia M.', photographer_id:1, rating:5, comment:'Lina made my graduation shoot feel so natural and fun!', date:'Oct 18, 2026'},
  {name:'Emma W.', photographer_id:2, rating:5, comment:'The attention to every little detail was incredible.', date:'Oct 12, 2026'},
  {name:'Olivia R.', photographer_id:3, rating:5, comment:'Warm, candid family portraits that look like a storybook.', date:'Sep 29, 2026'}
];
const defaultStats = {
  booking_summary: { total: 48, pending: 11, completed: 37 },
  requested_times: [{ slot:'4:00 PM – 6:00 PM (Golden Hour)', count:21 }, { slot:'10:00 AM – 12:00 PM (Morning)', count:15 }, { slot:'2:00 PM – 4:00 PM (Afternoon)', count:12 }],
  top_photographer: { name:'Lina Carter', sessions:22, rating:'4.9 ★' },
  popular_package: { name:'Graduation Photography', price:'$180.00', count:18 },
  packages: [{ name:'Graduation Photography', count:18, percent:90 }, { name:'Portrait Photography', count:14, percent:70 }, { name:'Family Photography', count:10, percent:50 }, { name:'Product Photography', count:6, percent:30 }],
  active_packages: 4,
  photographers: [{ name:'Lina Carter', sessions:22, percent:88 }, { name:'Amelia Rose', sessions:16, percent:64 }, { name:'Sarah Nabil', sessions:10, percent:40 }],
  staff_count: 3
};

const $ = id => document.getElementById(id);

function renderPhotographers() {
  $('reviewFilter').innerHTML = '<option value="all">All photographers</option>' + photographers.map(p => `<option value="${p.id}">${p.name}</option>`).join('');
  $('photographerGrid').innerHTML = photographers.map(p => `
    <div class="col-md-4">
      <div class="card rounded-0 h-100 p-3 border" style="background-color:${p.bg || '#f0e3d5'};">
        <img src="${p.image}" alt="${p.name}" class="w-100" style="height:230px; object-fit:cover;">
        <div class="pt-3 d-flex flex-column flex-grow-1">
          <div class="text-uppercase fw-bold mb-1" style="font-size:10px; letter-spacing:2px; color:#856d5c;">PHOTOGRAPHER</div>
          <h3 class="h4 mb-1" style="font-family:'Playfair Display',serif; color:#583522;">${p.name}</h3>
          <div class="small mb-3" style="color:#6e5b4f;">${p.specialty}</div>
          <div class="d-flex justify-content-between align-items-center pt-3 mt-auto border-top">
            <span style="color:#aa773d;">★★★★★</span>
            <a class="fw-bold text-decoration-none small border-bottom" style="color:#4f3324;" href="#reviews" onclick="document.getElementById('reviewFilter').value='${p.id}';renderReviews();">Reviews ↗</a>
          </div>
        </div>
      </div>
    </div>`).join('');
}

function renderReviews() {
  const pid = $('reviewFilter').value, stars = $('starFilter').value;
  const list = reviews.filter(r => (pid === 'all' || String(r.photographer_id) === pid) && (stars === 'all' || Number(r.rating) === Number(stars)));
  $('reviewGrid').innerHTML = list.length ? list.map(r => {
    const ph = photographers.find(p => String(p.id) === String(r.photographer_id)) || { name:'Studio Artist' };
    return `
    <div class="col-md-6 col-lg-4">
      <div class="card rounded-0 h-100 p-4 bg-white border-2" style="border-color:#745a47; box-shadow:6px 6px 0 #c9def6;">
        <div class="fs-5 mb-2" style="color:#a7794e;">${'★'.repeat(r.rating) + '☆'.repeat(5 - r.rating)}</div>
        <p class="mb-4" style="color:#46382f;">“${r.comment}”</p>
        <div class="d-flex justify-content-between align-items-end mt-auto">
          <div><div class="fw-bold">${r.name}</div><div class="small text-secondary">for ${ph.name}</div></div>
          <div class="small text-secondary">${r.date}</div>
        </div>
      </div>
    </div>`;
  }).join('') : '<div class="col-12 text-center py-4 text-secondary">No reviews match this filter yet.</div>';
}

function renderDashboard(d) {
  $('statTotal').textContent = d.booking_summary.total;
  $('statPending').textContent = d.booking_summary.pending;
  $('statCompleted').textContent = d.booking_summary.completed;
  $('requestedTimesList').innerHTML = d.requested_times.map(t => `<li class="list-group-item px-0 py-3 d-flex justify-content-between bg-transparent"><span class="fw-semibold">${t.slot}</span><span class="badge rounded-pill px-3 py-2" style="background-color:#583522;">${t.count} bookings</span></li>`).join('');
  $('topPhName').textContent = d.top_photographer.name;
  $('topPhRating').textContent = d.top_photographer.rating;
  $('topPhCount').textContent = `${d.top_photographer.sessions} Bookings`;
  $('topPkgName').textContent = d.popular_package.name;
  $('topPkgPrice').textContent = d.popular_package.price;
  $('topPkgCount').textContent = `${d.popular_package.count} Orders`;
  $('activePkgBadge').textContent = `${d.active_packages} Active`;
  $('packagesChartContainer').innerHTML = d.packages.map(p => `<div class="mb-3"><div class="d-flex justify-content-between small fw-semibold mb-1"><span>${p.name}</span><span>${p.count} bookings</span></div><div class="progress rounded-0" style="height:10px;background:#f0e5d7;"><div class="progress-bar" style="width:${p.percent}%;background:#583522;"></div></div></div>`).join('');
  $('staffCountBadge').textContent = `${d.staff_count} Staff`;
  $('photographersChartContainer').innerHTML = d.photographers.map(ph => `<div class="mb-3"><div class="d-flex justify-content-between small fw-semibold mb-1"><span>${ph.name}</span><span>${ph.sessions} sessions</span></div><div class="progress rounded-0" style="height:10px;background:#f0e5d7;"><div class="progress-bar" style="width:${ph.percent}%;background:#8c5c43;"></div></div></div>`).join('');
}

async function init() {
  renderPhotographers(); renderReviews(); renderDashboard(defaultStats);
  $('reviewFilter').onchange = $('starFilter').onchange = renderReviews;

  try { const r = await fetch('/api/dashboard/stats'); if (r.ok) renderDashboard(await r.json()); } catch {}
  try {
    const r = await fetch('http://127.0.0.1:8002/api/users');
    if (r.ok) {
      const list = (await r.json()).filter(u => (u.role || '').toLowerCase() === 'photographer');
      if (list.length) {
        const bgs = ['#f0e3d5', '#c9dff4', '#dcc6ac'];
        photographers = list.map((u, i) => ({ id:u.id, name:u.name, specialty:u.specialty || 'Studio Photographer', image:u.profile_image || photographers[i % 3].image, bg:bgs[i % 3] }));
        renderPhotographers();
      }
    }
  } catch {}
  try {
    const r = await fetch('http://127.0.0.1:8003/api/reviews');
    if (r.ok) {
      const list = await r.json();
      if (list.length) {
        reviews = list.map(x => ({ name:x.client_name || `Client #${x.client_user_id}`, photographer_id:x.photographer_id, rating:x.rating || 5, comment:x.comment, date:'Verified' }));
        renderReviews();
      }
    }
  } catch {}
}
init();
</script>
@endsection