<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Atelier Frame — Session Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="--bs-body-bg:#faf7f1; --bs-body-color:#34241e; --bs-body-font-family:'DM Sans',sans-serif; --bs-border-color:#583522;">

  <!-- Cream Header Banner -->
  <header class="border-bottom px-4 px-md-5 py-4" style="background-color:#fffcf8; border-color:#dfd0bf !important;">
    <div class="container-fluid px-0 d-flex flex-wrap justify-content-between align-items-end gap-3">
      <div>
        <div class="text-uppercase fw-bold small mb-1" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">STEP 1 OF 2 · STUDIO ROLL &amp; PACKAGE SELECTION</div>
        <h1 class="display-5 mb-0" style="font-family:'Playfair Display',serif; color:#583522;">Your photography <em style="color:#8c5c43;">session cart</em></h1>
      </div>
      <p class="small mb-0" style="color:#6e5b4f;">Review your selected shoots &amp; darkroom extras before developing your receipt.</p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container-fluid px-4 px-md-5 py-5 flex-grow-1">
    <div class="row g-4 g-lg-5">
      
      <!-- Left Column: Session Cards & Darkroom Add-ons -->
      <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-uppercase fw-bold" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">35MM BOOKING ROLL · SELECTED PACKAGES</span>
          <button type="button" id="restoreBtn" class="btn btn-sm rounded-pill border border-2 px-3 fw-semibold" style="display:none; background:#fff; border-color:#583522 !important; color:#583522;">Reload Film Roll ↻</button>
        </div>

        <div id="cartItemsContainer"></div>

        <!-- Darkroom Add-ons -->
        <div class="mt-5 pt-3 border-top border-2" style="border-top-style:dashed !important; border-color:#8c6e5b !important;">
          <div class="text-uppercase fw-bold mb-3" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">DARKROOM EXTRAS · CLIP TO YOUR SESSION</div>
          <div class="row g-3" id="addonsContainer"></div>
        </div>
      </div>

      <!-- Right Column: Subtly Refined Order Details Card -->
      <div class="col-lg-4">
        <div class="card rounded-0 border border-2 p-4 p-xl-5 sticky-top" style="top:24px; background-color:#f0e5d7; border-color:#583522 !important; box-shadow:7px 7px 0 #583522;">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-uppercase fw-bold" style="letter-spacing:2px; font-size:10px; color:#856d5c;">VIEWFINDER SUMMARY</span>
            <span class="badge rounded-0 font-monospace px-2 py-1" style="background-color:#583522; font-size:10px;">ISO 400 · READY</span>
          </div>
          <h2 class="h2 mb-4 pb-3 border-bottom" style="font-family:'Playfair Display',serif; color:#583522; border-color:#cbbba8 !important;">Order Details</h2>

          <div class="d-flex justify-content-between align-items-center py-2 fs-5">
            <span style="color:#4a372d;">Session Packages <span class="small text-secondary" id="sessionCountBadge">(2)</span></span>
            <strong style="color:#34241e;" id="subtotalText">$0.00</strong>
          </div>

          <div class="d-flex justify-content-between align-items-center py-2 fs-5">
            <span style="color:#4a372d;">Darkroom Add-ons <span class="small text-secondary" id="addonCountBadge">(1)</span></span>
            <strong style="color:#34241e;" id="addonsText">$0.00</strong>
          </div>

          <div class="d-flex justify-content-between align-items-center py-2 mb-3 fs-5">
            <span style="color:#4a372d;">Studio Tax (5%)</span>
            <strong style="color:#34241e;" id="taxText">$0.00</strong>
          </div>

          <div class="d-flex justify-content-between align-items-baseline pt-4 mb-4 border-top border-2" style="border-top-style:dashed !important; border-color:#583522 !important;">
            <span class="small fw-bold text-uppercase" style="letter-spacing:1.5px; color:#583522;">Total Due</span>
            <span class="h1 mb-0 fw-bold" style="font-family:'DM Sans',sans-serif; color:#583522;" id="grandTotalText">$0.00</span>
          </div>

          <button type="button" id="proceedBtn" class="btn w-100 rounded-pill py-3 fs-6 fw-semibold text-white" style="background-color:#583522;">
            Proceed to Payment →
          </button>
        </div>
      </div>

    </div>
  </main>

  <!-- Centered Powder Blue Footer -->
  <footer class="border-top border-2 px-4 py-4 text-center" style="background-color:#c9def6; border-color:#583522 !important;">
    <div style="font-family:'Playfair Display',serif; font-style:italic; font-size:26px; color:#583522; line-height:1;">Atelier Frame</div>
    <div class="fw-bold text-uppercase mt-1" style="font-size:9px; letter-spacing:3px; color:#463a35;">PHOTOGRAPHY STUDIO</div>
    <div class="mt-3 mb-1" style="font-size:13px; color:#34241e;">A little bit of magic in every frame.</div>
    <div class="small" style="color:#6e5b4f;">Payments &amp; Checkout Service · CS383 Group 5</div>
  </footer>

<script>
  const defaultCart = [
    {
      booking_id: 201,
      frame: 'FRAME 01A · 35MM',
      title: 'Golden Hour Portrait Session',
      photographer: 'Lina Carter',
      date: 'Nov 28, 2026 · 4:30 PM',
      price: 180.00,
      image: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&q=80&auto=format&fit=crop'
    },
    {
      booking_id: 202,
      frame: 'FRAME 02A · 35MM',
      title: 'Floral Studio Editorial Shoot',
      photographer: 'Amelia Rose',
      date: 'Dec 03, 2026 · 2:00 PM',
      price: 140.00,
      image: 'https://images.unsplash.com/photo-1519741497674-611481863552?w=400&q=80&auto=format&fit=crop'
    }
  ];

  const availableAddons = [
    { id: 'ad1', name: 'Vintage Polaroid Print Pack (10 prints)', price: 25.00, selected: true },
    { id: 'ad2', name: 'Express 24-Hour Color Grading', price: 35.00, selected: false },
    { id: 'ad3', name: 'Linen Hardcover Mini Lookbook', price: 55.00, selected: false }
  ];

  let cartItems = [...defaultCart];

  function renderCart() {
    const container = document.getElementById('cartItemsContainer');
    document.getElementById('restoreBtn').style.display = cartItems.length === 0 ? 'inline-block' : 'none';

    if (cartItems.length === 0) {
      container.innerHTML = `<div class="card rounded-0 border-2 p-5 text-center" style="border-color:#583522; background:#fff;">Your film roll is empty. Click <strong>Reload Film Roll</strong> to restore sample sessions.</div>`;
    } else {
      container.innerHTML = cartItems.map((item, idx) => `
        <div class="card rounded-0 border-2 mb-4" style="background-color:#3b2820; border-color:#583522; box-shadow:6px 6px 0 #c9def6;">
          <div class="px-3 py-1 d-flex justify-content-between text-white-50 font-monospace" style="font-size:10px; letter-spacing:2px;">
            <span>▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫</span>
            <span>KODAK PORTRA 400</span>
            <span>▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫</span>
          </div>
          <div class="bg-white mx-2 p-3 p-md-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
              <div class="bg-white p-1 pb-3 border shadow-sm" style="width:105px; height:112px; border-color:#cbbba8 !important;">
                <img src="${item.image}" alt="${item.title}" class="w-100 h-100 object-fit-cover">
              </div>
              <div>
                <div class="font-monospace fw-bold small mb-1" style="color:#b5854b; letter-spacing:1.5px;">${item.frame} · BOOKING #${item.booking_id}</div>
                <h3 class="h4 mb-1" style="font-family:'Playfair Display',serif; color:#583522;">${item.title}</h3>
                <div class="small text-secondary">Photographer: <strong>${item.photographer}</strong> · ${item.date}</div>
              </div>
            </div>
            <div class="text-end ms-auto">
              <div class="fs-3 fw-semibold" style="font-family:'Playfair Display',serif; color:#583522;">$${item.price.toFixed(2)}</div>
              <button type="button" class="btn btn-sm btn-link text-danger text-decoration-none p-0 mt-1 fw-semibold" onclick="removeItem(${idx})">Remove Frame ✕</button>
            </div>
          </div>
          <div class="px-3 py-1 d-flex justify-content-between text-white-50 font-monospace" style="font-size:10px; letter-spacing:2px;">
            <span>▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫</span>
            <span>${item.frame}</span>
            <span>▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫ ▫</span>
          </div>
        </div>
      `).join('');
    }
    updateTotals();
  }

  function renderAddons() {
    const box = document.getElementById('addonsContainer');
    box.innerHTML = availableAddons.map((ad, idx) => `
      <div class="col-md-4">
        <div class="card rounded-0 border-2 p-3 h-100 d-flex flex-column justify-content-between" role="button" onclick="toggleAddon(${idx})"
             style="border-color:#583522; background-color:${ad.selected ? '#e9f1f9' : '#fffcf8'}; box-shadow:4px 4px 0 ${ad.selected ? '#583522' : '#dfd0bf'};">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" ${ad.selected ? 'checked' : ''} id="chk_${ad.id}">
            <label class="form-check-label fw-semibold" for="chk_${ad.id}" role="button">${ad.name}</label>
          </div>
          <div class="mt-3 fw-bold" style="color:#583522;">+$${ad.price.toFixed(2)}</div>
        </div>
      </div>
    `).join('');
  }

  window.removeItem = function(idx) {
    cartItems.splice(idx, 1);
    renderCart();
  };

  window.toggleAddon = function(idx) {
    availableAddons[idx].selected = !availableAddons[idx].selected;
    renderAddons();
    updateTotals();
  };

  function updateTotals() {
    const selectedAddons = availableAddons.filter(a => a.selected);
    const sub = cartItems.reduce((sum, i) => sum + i.price, 0);
    const add = selectedAddons.reduce((sum, a) => sum + a.price, 0);
    const tax = (sub + add) * 0.05;
    const total = sub + add + tax;

    document.getElementById('sessionCountBadge').textContent = `(${cartItems.length})`;
    document.getElementById('addonCountBadge').textContent = `(${selectedAddons.length})`;
    document.getElementById('subtotalText').textContent = `$${sub.toFixed(2)}`;
    document.getElementById('addonsText').textContent = `$${add.toFixed(2)}`;
    document.getElementById('taxText').textContent = `$${tax.toFixed(2)}`;
    document.getElementById('grandTotalText').textContent = `$${total.toFixed(2)}`;
  }

  document.getElementById('restoreBtn').addEventListener('click', () => {
    cartItems = [...defaultCart];
    renderCart();
  });

  document.getElementById('proceedBtn').addEventListener('click', () => {
    const selectedAddons = availableAddons.filter(a => a.selected);
    const sub = cartItems.reduce((sum, i) => sum + i.price, 0);
    const add = selectedAddons.reduce((sum, a) => sum + a.price, 0);
    const tax = Number(((sub + add) * 0.05).toFixed(2));
    const total = Number((sub + add + tax).toFixed(2));
    const primaryBooking = cartItems[0] || { booking_id: 201, title: 'Custom Studio Session', photographer: 'Lina Carter', image: defaultCart[0].image };

    const loggedInClientId = Number(localStorage.getItem('user_id')) || 101;
    const loggedInClientName = localStorage.getItem('user_name') || 'Jana Darandari';

    localStorage.setItem('atelier_checkout', JSON.stringify({
      booking_id: primaryBooking.booking_id,
      client_id: loggedInClientId,
      client_name: loggedInClientName,
      sessions: cartItems.map(s => ({ title: s.title, photographer: s.photographer, price: s.price })),
      addons: selectedAddons.map(a => ({ name: a.name, price: a.price })),
      tax: tax,
      amount: total > 0 ? total : 150.00,
      image: primaryBooking.image
    }));
    window.location.href = '/payment';
  });

  renderCart();
  renderAddons();
</script>
</body>
</html>