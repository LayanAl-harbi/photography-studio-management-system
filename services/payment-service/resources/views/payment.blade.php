<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Atelier Frame — Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="--bs-body-bg:#faf7f1; --bs-body-color:#34241e; --bs-body-font-family:'DM Sans',sans-serif; --bs-border-color:#583522;">

  <!-- Cream Header Banner -->
  <header class="border-bottom px-4 px-md-5 py-4" style="background-color:#fffcf8; border-color:#dfd0bf !important;">
    <div class="container-fluid px-0 d-flex flex-wrap justify-content-between align-items-end gap-3">
      <div>
        <div class="text-uppercase fw-bold small mb-1" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">STEP 2 OF 2 · STUDIO BILLING &amp; RECEIPT</div>
        <h1 class="display-5 mb-0" style="font-family:'Playfair Display',serif; color:#583522;">Complete your <em style="color:#8c5c43;">payment</em></h1>
      </div>
      <p class="small mb-0" style="color:#6e5b4f;">Review your itemized booking summary and confirm your payment method below.</p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container-fluid px-4 px-md-5 py-5 flex-grow-1">
    <div class="row g-4 g-lg-5 align-items-stretch">

      <!-- Left Column: Payment Ticket -->
      <div class="col-lg-7">
        <div class="card rounded-0 border-2 h-100" style="background-color:#fffcf8; border-color:#583522; box-shadow:7px 7px 0 #c9def6;">
          <div class="card-header rounded-0 border-bottom border-2 px-4 py-3 d-flex justify-content-between align-items-center" style="background-color:#f0e5d7; border-bottom-style:dashed !important; border-color:#a58c7d !important;">
            <span class="text-uppercase fw-bold" style="letter-spacing:2.5px; font-size:10px; color:#856d5c;">STUDIO BILLING TICKET</span>
            <span class="small fw-bold font-monospace" style="color:#583522;" id="txnBadge">TXN-000000</span>
          </div>

          <div class="card-body p-4 p-md-5">
            <!-- Success Receipt Banner (Hidden until paid) -->
            <div id="receiptAlert" class="alert rounded-0 border-2 mb-4 d-none" style="background-color:#e9f1f9; border-color:#583522; color:#34241e;">
              <div class="d-flex justify-content-between align-items-center">
                <strong style="color:#583522;">✓ Payment Confirmed &amp; Receipt Generated</strong>
                <span class="badge rounded-0" style="background-color:#583522;">PAID</span>
              </div>
              <div class="small mt-1" id="receiptDetailsText"></div>
            </div>

            <!-- Itemized Summary -->
            <div class="p-3 p-md-4 mb-4 border border-2" style="background-color:#faf7f1; border-color:#cbbba8 !important;">
              <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom" style="border-color:#dfd0bf !important;">
                <span class="text-uppercase fw-bold" style="letter-spacing:2px; font-size:10px; color:#856d5c;">BOOKING SUMMARY</span>
                <span class="small fw-semibold" style="color:#583522;" id="summaryClientLine">Client: Jana Darandari</span>
              </div>
              <div id="itemizedListContainer" class="mb-3"></div>
              <div class="pt-3 border-top border-2 d-flex justify-content-between align-items-center" style="border-color:#583522 !important;">
                <span class="fw-bold text-uppercase small" style="letter-spacing:1.5px; color:#583522;">Total Amount Due</span>
                <span class="h2 mb-0 fw-semibold" style="font-family:'Playfair Display',serif; color:#583522;" id="summaryAmountDisplay">$362.25</span>
              </div>
            </div>

            <!-- Payment Form -->
            <form id="checkoutForm" autocomplete="off" novalidate>
              <input type="hidden" id="bookingId">
              <input type="hidden" id="clientId">
              <input type="hidden" id="amount">
              <input type="hidden" id="paymentMethod" value="card">
              <input type="hidden" id="txnInput">

              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label fw-semibold small d-block">Choose Payment Method</label>
                  <div class="row g-3">
                    <div class="col-6">
                      <div class="card rounded-0 border-2 p-3" role="button" id="tileCard" onclick="selectMethod('card')" style="border-color:#583522; background-color:#e9f1f9; box-shadow:4px 4px 0 #583522;">
                        <div class="fw-bold" style="color:#583522;">💳 Credit / Debit Card</div>
                        <div class="small text-secondary">Instant studio card authorization</div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card rounded-0 border-2 p-3" role="button" id="tileOnline" onclick="selectMethod('online')" style="border-color:#cbbba8; background-color:#fff;">
                        <div class="fw-bold" style="color:#583522;">🌐 Online Transfer / Apple Pay</div>
                        <div class="small text-secondary">Digital wallet or online gateway</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Card Fields -->
                <div class="col-12" id="cardFieldsGroup">
                  <div class="row g-3 mt-1">
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small" for="holderInput">Cardholder Name</label>
                      <input type="text" id="holderInput" name="atelier_holder" autocomplete="off" class="form-control border-2" style="border-color:#886854;" placeholder="Full name on card" required>
                      <div class="invalid-feedback">Please enter the cardholder's full name.</div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small" for="digitsInput">Card Number</label>
                      <input type="text" id="digitsInput" name="atelier_digits" autocomplete="off" inputmode="numeric" class="form-control border-2 font-monospace" style="border-color:#886854;" placeholder="0000 0000 0000 0000" maxlength="19" required>
                      <div class="invalid-feedback">Please enter a valid 16-digit card number.</div>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small" for="expInput">Expiration Date</label>
                      <input type="text" id="expInput" name="atelier_exp" autocomplete="off" inputmode="numeric" class="form-control border-2 font-monospace" style="border-color:#886854;" placeholder="MM / YY" maxlength="7" required>
                      <div class="invalid-feedback">Enter expiration date (MM / YY).</div>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small" for="secInput">CVV / Security Code</label>
                      <input type="text" id="secInput" name="atelier_sec" autocomplete="off" inputmode="numeric" class="form-control border-2 font-monospace" style="border-color:#886854;" placeholder="123" maxlength="4" required>
                      <div class="invalid-feedback">Enter 3 or 4-digit security code.</div>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small" for="postalInput">Billing ZIP Code</label>
                      <input type="text" id="postalInput" name="atelier_postal" autocomplete="off" class="form-control border-2" style="border-color:#886854;" placeholder="46421" required>
                      <div class="invalid-feedback">Please enter your billing ZIP code.</div>
                    </div>
                  </div>
                </div>

                <!-- Online Transfer Message -->
                <div class="col-12 mt-3" id="onlineFieldsGroup" style="display:none;">
                  <div class="p-3 border border-2" style="background-color:#e9f1f9; border-color:#583522 !important;">
                    <div class="fw-semibold" style="color:#583522;">Instant Digital Wallet / Bank Transfer</div>
                    <div class="small text-secondary mt-1">Click <strong>"Confirm &amp; Pay"</strong> below to authorize your transfer via Atelier Frame's online gateway.</div>
                  </div>
                </div>

                <div class="col-12 mt-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                  <a href="/" class="text-decoration-none fw-semibold" style="color:#583522;">← Back to Session Cart</a>
                  <button type="submit" id="paySubmitBtn" class="btn rounded-pill px-5 py-3 fs-6 fw-semibold text-white" style="background-color:#583522;">
                    Confirm &amp; Pay →
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Right Column: Cozy Vintage Film Camera Flat-Lay Photo -->
      <div class="col-lg-5">
        <div class="card rounded-0 border-2 h-100 overflow-hidden" style="border-color:#583522; box-shadow:7px 7px 0 #583522; min-height:460px; background-color:#f0e5d7;">
          <img src="https://images.unsplash.com/photo-1502982720700-bfff97f2ecac?w=1000&q=85&auto=format&fit=crop" alt="Vintage Film Camera Flat-Lay" class="w-100 h-100 object-fit-cover">
        </div>
      </div>

    </div>
  </main>

  <!-- Centered Powder Blue Footer (Matches Pic 1) -->
  <footer class="border-top border-2 px-4 py-4 text-center" style="background-color:#c9def6; border-color:#583522 !important;">
    <div style="font-family:'Playfair Display',serif; font-style:italic; font-size:26px; color:#583522; line-height:1;">Atelier Frame</div>
    <div class="fw-bold text-uppercase mt-1" style="font-size:9px; letter-spacing:3px; color:#463a35;">PHOTOGRAPHY STUDIO</div>
    <div class="mt-3 mb-1" style="font-size:13px; color:#34241e;">A little bit of magic in every frame.</div>
    <div class="small" style="color:#6e5b4f;">Payments &amp; Checkout Service · CS383 Group 5</div>
  </footer>

<script>
  const generateTxn = () => 'TXN-' + Math.floor(100000 + Math.random() * 900000);
  const savedCart = JSON.parse(localStorage.getItem('atelier_checkout') || 'null');
  const initialData = (savedCart && savedCart.sessions) ? savedCart : {
    booking_id: 201,
    client_id: Number(localStorage.getItem('user_id')) || 101,
    client_name: localStorage.getItem('user_name') || 'Jana Darandari',
    sessions: [
      { title: 'Golden Hour Portrait Session', photographer: 'Lina Carter', price: 180.00 },
      { title: 'Floral Studio Editorial Shoot', photographer: 'Amelia Rose', price: 140.00 }
    ],
    addons: [{ name: 'Vintage Polaroid Print Pack (10 prints)', price: 25.00 }],
    tax: 17.25,
    amount: 362.25
  };

  const firstTxn = generateTxn();
  document.getElementById('bookingId').value = initialData.booking_id;
  document.getElementById('clientId').value = initialData.client_id;
  document.getElementById('amount').value = Number(initialData.amount).toFixed(2);
  document.getElementById('txnInput').value = firstTxn;
  document.getElementById('txnBadge').textContent = firstTxn;
  document.getElementById('holderInput').value = initialData.client_name;
  document.getElementById('summaryClientLine').textContent = `Client: ${initialData.client_name}`;
  document.getElementById('summaryAmountDisplay').textContent = `$${Number(initialData.amount).toFixed(2)}`;

  document.getElementById('itemizedListContainer').innerHTML = [
    ...initialData.sessions.map(s => `<div class="d-flex justify-content-between py-1"><span><strong>${s.title}</strong> <span class="small text-secondary">· ${s.photographer}</span></span><strong>$${Number(s.price).toFixed(2)}</strong></div>`),
    ...initialData.addons.map(a => `<div class="d-flex justify-content-between py-1"><span class="text-secondary">+ ${a.name}</span><strong>$${Number(a.price).toFixed(2)}</strong></div>`),
    `<div class="d-flex justify-content-between pt-2 mt-1 border-top" style="border-color:#e6d9ca !important;"><span class="small text-secondary">Studio Tax (5%)</span><span class="small fw-semibold text-secondary">$${Number(initialData.tax).toFixed(2)}</span></div>`
  ].join('');

  const digitsEl = document.getElementById('digitsInput');
  const expEl = document.getElementById('expInput');
  const secEl = document.getElementById('secInput');

  digitsEl.addEventListener('input', e => {
    const d = e.target.value.replace(/\D/g, '').slice(0, 16);
    e.target.value = d.replace(/(.{4})/g, '$1 ').trim();
    digitsEl.setCustomValidity(d.length === 16 ? '' : 'Invalid');
  });
  expEl.addEventListener('input', e => {
    const d = e.target.value.replace(/\D/g, '').slice(0, 4);
    e.target.value = d.length >= 3 ? `${d.slice(0, 2)} / ${d.slice(2)}` : d;
    expEl.setCustomValidity(d.length === 4 ? '' : 'Invalid');
  });
  secEl.addEventListener('input', e => {
    const d = e.target.value.replace(/\D/g, '').slice(0, 4);
    e.target.value = d;
    secEl.setCustomValidity(d.length >= 3 ? '' : 'Invalid');
  });

  window.selectMethod = method => {
    document.getElementById('paymentMethod').value = method;
    const isCard = method === 'card';
    document.getElementById('tileCard').style.cssText = isCard ? 'border-color:#583522; background-color:#e9f1f9; box-shadow:4px 4px 0 #583522;' : 'border-color:#cbbba8; background-color:#fff;';
    document.getElementById('tileOnline').style.cssText = !isCard ? 'border-color:#583522; background-color:#e9f1f9; box-shadow:4px 4px 0 #583522;' : 'border-color:#cbbba8; background-color:#fff;';
    document.getElementById('cardFieldsGroup').style.display = isCard ? 'block' : 'none';
    document.getElementById('onlineFieldsGroup').style.display = isCard ? 'none' : 'block';
    document.getElementById('cardFieldsGroup').querySelectorAll('input').forEach(i => { i.required = isCard; if (!isCard) i.setCustomValidity(''); });
    document.getElementById('checkoutForm').classList.remove('was-validated');
  };

  document.getElementById('checkoutForm').addEventListener('submit', async e => {
    e.preventDefault();
    const form = e.target;
    const method = document.getElementById('paymentMethod').value;

    if (method === 'card') {
      digitsEl.setCustomValidity(digitsEl.value.replace(/\D/g, '').length === 16 ? '' : 'Invalid');
      expEl.setCustomValidity(expEl.value.replace(/\D/g, '').length === 4 ? '' : 'Invalid');
      secEl.setCustomValidity(secEl.value.replace(/\D/g, '').length >= 3 ? '' : 'Invalid');
    }
    if (!form.checkValidity()) { form.classList.add('was-validated'); return; }

    form.classList.remove('was-validated');
    const btn = document.getElementById('paySubmitBtn');
    btn.disabled = true;
    btn.textContent = 'Processing...';

    const payload = {
      booking_id: Number(document.getElementById('bookingId').value),
      client_id: Number(document.getElementById('clientId').value),
      amount: Number(document.getElementById('amount').value),
      payment_method: method,
      status: 'paid',
      transaction_id: document.getElementById('txnInput').value
    };

    try {
      await fetch('/api/payments', { method: 'POST', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }, body: JSON.stringify(payload) });
    } catch (_) {}

    document.getElementById('receiptDetailsText').textContent = `Reference ${payload.transaction_id} · Paid $${payload.amount.toFixed(2)} via ${method.toUpperCase()} for ${initialData.client_name}.`;
    document.getElementById('receiptAlert').classList.remove('d-none');

    const nextTxn = generateTxn();
    document.getElementById('txnInput').value = nextTxn;
    document.getElementById('txnBadge').textContent = nextTxn;
    btn.disabled = false;
    btn.textContent = 'Confirm & Pay →';
  });
</script>
</body>
</html>