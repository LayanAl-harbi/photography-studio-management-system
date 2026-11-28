
@extends('layouts.app')

@section('title', 'Admin Dashboard')


@section('content')

<style>
    #dashboard-navigation .nav-link.active {
        background-color: #8C6B4F;
        color: #fff !important;
    }
</style>

<div id="admin-dashboard" hidden>
<div class="container-fluid py-4">

    <!-- Dashboard Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Studio Dashboard</h2>
            <p class="text-muted mb-0">Manage the studio from one place</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-dark px-3 py-2">Admin</span>
            <button type="button" class="btn btn-outline-dark" id="logout-button">
                Logout
            </button>
        </div>
    </div>

    <nav class="nav nav-pills flex-wrap gap-2 mb-4" id="dashboard-navigation" aria-label="Admin dashboard sections">
        <button type="button" class="nav-link active" role="tab" aria-selected="true" aria-controls="section-overview" data-dashboard-section="overview">Overview</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-users" data-dashboard-section="users">User Management</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-bookings" data-dashboard-section="bookings">Bookings</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-payments" data-dashboard-section="payments">Payments</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-reviews" data-dashboard-section="reviews">Reviews</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-availability" data-dashboard-section="availability">Availability</button>
        <button type="button" class="nav-link" role="tab" aria-selected="false" aria-controls="section-packages" data-dashboard-section="packages">Packages</button>
    </nav>

    <section id="section-overview" role="tabpanel" aria-label="Overview">
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Overview</h3>
            <p class="text-muted mb-0">Account totals use the Auth Service account list. Other service data will appear when those integrations are ready.</p>
        </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">

        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Managed Accounts</p>
                    <h3 class="fw-bold mb-0" id="total-users-count">—</h3>
                    <small class="text-muted">Clients and photographers</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Clients</p>
                    <h3 class="fw-bold mb-0" id="clients-count">—</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Photographers</p>
                    <h3 class="fw-bold mb-0" id="photographers-count">—</h3>
                </div>
            </div>
        </div>

    </div>

        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-4"><div class="card border-0 shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-2">Bookings</p><span class="badge bg-secondary-subtle text-secondary">Not connected</span>
                <p class="small text-muted mt-2 mb-0">Booking service integration is pending.</p>
            </div></div></div>
            <div class="col-sm-6 col-xl-4"><div class="card border-0 shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-2">Payments</p><span class="badge bg-secondary-subtle text-secondary">Pending integration</span>
                <p class="small text-muted mt-2 mb-0">Payment API security must be addressed first.</p>
            </div></div></div>
            <div class="col-sm-6 col-xl-4"><div class="card border-0 shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-2">Reviews / Average Rating</p><span class="badge bg-secondary-subtle text-secondary">Not connected</span>
                <p class="small text-muted mt-2 mb-0">No review statistics are loaded here yet.</p>
            </div></div></div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3"><h5 class="fw-bold mb-0">Recent Account Registrations</h5></div>
                    <div class="list-group list-group-flush" id="recent-accounts-list" aria-live="polite">
                        <div class="list-group-item text-muted">Loading account activity...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3"><h5 class="fw-bold mb-0">Quick Actions</h5></div>
                    <div class="card-body d-flex flex-column align-items-start gap-2">
                        <button type="button" class="btn btn-dark" data-dashboard-section="users">Manage Accounts</button>
                        <button type="button" class="btn btn-outline-dark" data-dashboard-section="users" data-bs-toggle="modal" data-bs-target="#addPhotographerModal">Add Photographer</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-users" role="tabpanel" aria-label="User Management" hidden>
        <div class="mb-4"><h3 class="fw-bold mb-1">User Management</h3><p class="text-muted mb-0">View and manage client and photographer accounts.</p></div>

    <!-- Accounts Management -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                <div>
                    <h5 class="fw-bold mb-1">Accounts Management</h5>
                    <p class="text-muted small mb-0">
                        View and manage clients and photographers
                    </p>
                </div>

                <button
                    class="btn btn-dark"
                    data-bs-toggle="modal"
                    data-bs-target="#addPhotographerModal">
                    <i class="bi bi-plus-lg me-1"></i>
                    Add Photographer
                </button>

            </div>
        </div>

        <div class="card-body">

            <!-- Search and Filters -->
            <div class="row g-3 mb-4">

                <div class="col-md-5">
                    <input
                        type="text"
                        class="form-control"
                        id="account-search"
                        placeholder="Search by name or email..."
                    >
                </div>

                <div class="col-md-3">
                    <select class="form-select" id="account-role-filter">
                        <option value="all">All Roles</option>
                        <option value="client">Clients</option>
                        <option value="photographer">Photographers</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select class="form-select" id="account-status-filter">
                        <option value="all">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

            </div>

            <!-- Message -->
            <div id="accounts-message" class="mb-3"></div>

            <!-- Accounts Table -->
            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="accounts-table-body">
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                Loading accounts...
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>
    </div>

    </section>

    <section id="section-bookings" role="tabpanel" aria-label="Bookings" hidden>
        <div class="mb-4"><h3 class="fw-bold mb-1">Bookings</h3><p class="text-muted mb-0">Booking management will be available when its service is ready.</p></div>
        <div class="card border-0 shadow-sm"><div class="card-body py-5 text-center">
            <span class="badge bg-secondary-subtle text-secondary mb-3">Not connected</span>
            <h5 class="fw-bold">Booking service integration is pending</h5>
            <p class="text-muted mb-0">Booking records, creation, and cancellation are not available yet. No booking data is shown.</p>
        </div></div>
    </section>

    <section id="section-payments" role="tabpanel" aria-label="Payments" hidden>
        <div class="mb-4"><h3 class="fw-bold mb-1">Payments</h3><p class="text-muted mb-0">Payment management will be available after the service API is ready for secure access.</p></div>
        <div class="card border-0 shadow-sm"><div class="card-body py-5 text-center">
            <span class="badge bg-secondary-subtle text-secondary mb-3">Pending secure integration</span>
            <h5 class="fw-bold">Payment data is not connected</h5>
            <p class="text-muted mb-0">Payment records, details, statistics, and processing are not loaded here.</p>
        </div></div>
    </section>

    <section id="section-reviews" role="tabpanel" aria-label="Reviews" hidden>
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Reviews</h3>
            <p class="text-muted mb-0">Read-only reviews from the Profile/Reviews Service. Reviewer names are not provided by its API, so client IDs are shown.</p>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <h5 class="fw-bold mb-1">Review List</h5>
                    <p class="small text-muted mb-0">Review content is displayed as text.</p>
                </div>
                <button type="button" class="btn btn-outline-dark" id="retry-reviews-button">Retry</button>
            </div>
            <div class="card-body">
                <div id="reviews-feedback" class="alert alert-light border mb-0" role="status" aria-live="polite">
                    Open this section to load reviews.
                </div>
                <div class="table-responsive" id="reviews-table-container" hidden>
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Review ID</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Booking ID</th>
                                <th scope="col">Client ID</th>
                                <th scope="col">Photographer ID</th>
                                <th scope="col">Created</th>
                            </tr>
                        </thead>
                        <tbody id="reviews-table-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="section-availability" role="tabpanel" aria-label="Availability" hidden>
        <div class="mb-4"><h3 class="fw-bold mb-1">Availability</h3><p class="text-muted mb-0">Photographer availability management is planned for the Booking/Packages Service.</p></div>
        <div class="card border-0 shadow-sm"><div class="card-body py-5 text-center">
            <span class="badge bg-secondary-subtle text-secondary mb-3">Not connected</span>
            <h5 class="fw-bold">Availability management is not connected</h5>
            <p class="text-muted mb-0">No dates or time slots are loaded or editable yet.</p>
        </div></div>
    </section>

    <section id="section-packages" role="tabpanel" aria-label="Packages" hidden>
        <div class="mb-4"><h3 class="fw-bold mb-1">Packages</h3><p class="text-muted mb-0">Package management is planned for the Booking/Packages Service.</p></div>
        <div class="card border-0 shadow-sm"><div class="card-body py-5 text-center">
            <span class="badge bg-secondary-subtle text-secondary mb-3">Not connected</span>
            <h5 class="fw-bold">Packages are not connected</h5>
            <p class="text-muted mb-0">No package records or editing actions are available yet.</p>
        </div></div>
    </section>

</div>

<!-- Add Photographer Modal -->
<div class="modal fade" id="addPhotographerModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Photographer</h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="add-photographer-message"></div>

                <form id="add-photographer-form">

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text"
                               class="form-control"
                               id="photographer-name"
                               name="name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               id="photographer-email"
                               name="email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               class="form-control"
                               id="photographer-password"
                               name="password"
                               minlength="8"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                               class="form-control"
                               id="photographer-password-confirmation"
                               name="password_confirmation"
                               minlength="8"
                               required>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button"
                                class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit"
                                class="btn btn-dark"
                                id="add-photographer-submit">
                            Create Photographer
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
</div>

@endsection




@push('scripts')
<script>
const AUTH_API = 'http://127.0.0.1:8002/api';
let accounts = [];
let reviewsLoading = false;
let reviewsLoaded = false;

async function authorizeAdminPage() {
    const token = getToken();

    if (!token) {
        window.location.replace('/login');
        return false;
    }

    try {
        const response = await fetch(`${AUTH_API}/user`, {
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        if (response.status === 401) {
            sessionStorage.removeItem('auth_token');
            sessionStorage.removeItem('user');
            window.location.replace('/login');
            return false;
        }

        if (!response.ok) {
            window.location.replace('/');
            return false;
        }

        const user = await response.json();
        if (user.role !== 'admin') {
            window.location.replace('/');
            return false;
        }

        document.getElementById('admin-dashboard').hidden = false;
        return true;
    } catch (error) {
        window.location.replace('/login');
        return false;
    }
}

async function logoutAdmin() {
    const button = document.getElementById('logout-button');
    if (button.disabled) return;

    button.disabled = true;
    button.textContent = 'Logging out...';

    try {
        await fetch(`${AUTH_API}/logout`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${getToken() || ''}`
            }
        });
    } catch (error) {
        // The local session must still end if the service cannot be reached.
    } finally {
        sessionStorage.removeItem('auth_token');
        sessionStorage.removeItem('user');
        window.location.replace('/login');
    }
}

function getToken() {
    return sessionStorage.getItem('auth_token');
}

function openDashboardSection(sectionName) {
    const section = document.getElementById(`section-${sectionName}`);
    if (!section) return;

    document.querySelectorAll('#dashboard-navigation [data-dashboard-section]').forEach(button => {
        const selected = button.dataset.dashboardSection === sectionName;
        button.classList.toggle('active', selected);
        button.setAttribute('aria-selected', selected ? 'true' : 'false');
    });

    document.querySelectorAll('#admin-dashboard [id^="section-"]').forEach(panel => {
        panel.hidden = panel !== section;
    });
}

function escapeHTML(value) {
    return String(value ?? '').replace(/[&<>"']/g, char => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    }[char]));
}

function isActive(value) {
    return value === true || value === 1 || value === '1';
}

function showMessage(message, type = 'danger') {
    const container = document.getElementById('accounts-message');

    container.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show">
            ${escapeHTML(message)}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    `;
}

async function loadAccounts() {
    const tbody = document.getElementById('accounts-table-body');

    tbody.innerHTML = `
        <tr>
            <td colspan="5" class="text-center py-4 text-muted">
                Loading accounts...
            </td>
        </tr>
    `;

    try {
        const response = await fetch(`${AUTH_API}/admin/users`, {
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${getToken()}`
            }
        });

        if (!response.ok) {
            const data = await response.json().catch(() => ({}));
            throw new Error(data.message || 'Failed to load accounts.');
        }

        const data = await response.json();
        accounts = data.users || [];

        updateSummary();
        renderAccounts();

    } catch (error) {
        document.getElementById('total-users-count').textContent = '—';
        document.getElementById('clients-count').textContent = '—';
        document.getElementById('photographers-count').textContent = '—';
        document.getElementById('recent-accounts-list').innerHTML =
            '<div class="list-group-item text-danger">Account data could not be loaded.</div>';
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-danger py-4">
                    ${escapeHTML(error.message)}
                </td>
            </tr>
        `;
    }
}

function updateSummary() {
    const clients = accounts.filter(user => user.role === 'client');
    const photographers = accounts.filter(user => user.role === 'photographer');

    document.getElementById('total-users-count').textContent = accounts.length;
    document.getElementById('clients-count').textContent = clients.length;
    document.getElementById('photographers-count').textContent = photographers.length;
    renderRecentAccounts();
}

function renderRecentAccounts() {
    const list = document.getElementById('recent-accounts-list');

    if (accounts.length === 0) {
        list.innerHTML = '<div class="list-group-item text-muted">No client or photographer accounts to show yet.</div>';
        return;
    }

    list.innerHTML = accounts.slice(0, 5).map(user => {
        const createdAt = user.created_at ? new Date(user.created_at) : null;
        const dateLabel = createdAt && !Number.isNaN(createdAt.getTime())
            ? createdAt.toLocaleDateString()
            : 'Date unavailable';

        return `
            <div class="list-group-item d-flex justify-content-between align-items-center gap-3">
                <div class="min-w-0">
                    <div class="fw-semibold text-truncate">${escapeHTML(user.name)}</div>
                    <small class="text-muted">${escapeHTML(user.role)}</small>
                </div>
                <small class="text-muted text-nowrap">${escapeHTML(dateLabel)}</small>
            </div>
        `;
    }).join('');
}

function showReviewsFeedback(message, type = 'light') {
    const feedback = document.getElementById('reviews-feedback');
    feedback.className = `alert alert-${type} border mb-0`;
    feedback.textContent = message;
    feedback.hidden = false;
    document.getElementById('reviews-table-container').hidden = true;
}

function reviewField(value) {
    if (value === null || value === undefined || value === '') return '—';
    return escapeHTML(String(value));
}

function reviewCreatedDate(value) {
    if (!value) return '—';

    const date = new Date(value);
    return Number.isNaN(date.getTime())
        ? '—'
        : escapeHTML(date.toLocaleString());
}

async function loadReviews(forceRefresh = false) {
    if (reviewsLoading || (reviewsLoaded && !forceRefresh)) return;

    reviewsLoading = true;
    const retryButton = document.getElementById('retry-reviews-button');
    const tableBody = document.getElementById('reviews-table-body');
    const requestController = new AbortController();
    const timeoutId = setTimeout(() => requestController.abort(), 7000);

    retryButton.disabled = true;
    retryButton.textContent = 'Loading...';
    tableBody.replaceChildren();
    showReviewsFeedback('Loading reviews...', 'light');

    try {
        const response = await fetch(`${AUTH_API}/admin/reviews`, {
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${getToken()}`
            },
            signal: requestController.signal
        });

        if (response.status === 401) {
            sessionStorage.removeItem('auth_token');
            sessionStorage.removeItem('user');
            window.location.replace('/login');
            return;
        }

        if (response.status === 403) {
            showReviewsFeedback('You do not have permission to view reviews.', 'danger');
            return;
        }

        if (response.status === 503) {
            showReviewsFeedback('The Profile/Reviews Service is unavailable. Check that it is running, then retry.', 'warning');
            return;
        }

        if (!response.ok) {
            showReviewsFeedback('Reviews could not be loaded. Please retry.', 'danger');
            return;
        }

        const reviews = await response.json().catch(() => null);
        if (!Array.isArray(reviews) || !reviews.every(review => review && typeof review === 'object' && !Array.isArray(review))) {
            showReviewsFeedback('The Reviews Service returned data in an unexpected format.', 'danger');
            return;
        }

        reviewsLoaded = true;

        if (reviews.length === 0) {
            showReviewsFeedback('There are currently no reviews.', 'light');
            return;
        }

        tableBody.innerHTML = reviews.map(review => {
            const rating = review.rating !== null && review.rating !== undefined && review.rating !== ''
                ? Number(review.rating)
                : NaN;
            const ratingLabel = Number.isInteger(rating) && rating >= 1 && rating <= 5
                ? `${rating} / 5`
                : '—';

            return `
                <tr>
                    <td>${reviewField(review.id)}</td>
                    <td class="text-nowrap">${ratingLabel}</td>
                    <td class="text-break">${reviewField(review.comment)}</td>
                    <td>${reviewField(review.booking_id)}</td>
                    <td>${reviewField(review.client_user_id)}</td>
                    <td>${reviewField(review.photographer_id)}</td>
                    <td class="text-nowrap">${reviewCreatedDate(review.created_at)}</td>
                </tr>
            `;
        }).join('');

        document.getElementById('reviews-feedback').hidden = true;
        document.getElementById('reviews-table-container').hidden = false;
    } catch (error) {
        const message = error.name === 'AbortError'
            ? 'The review request timed out. The Profile/Reviews Service may be unavailable; please retry.'
            : 'Could not connect to the Auth Service. Please retry.';
        showReviewsFeedback(message, 'warning');
    } finally {
        clearTimeout(timeoutId);
        reviewsLoading = false;
        retryButton.disabled = false;
        retryButton.textContent = 'Retry';
    }
}

function renderAccounts() {
    const tbody = document.getElementById('accounts-table-body');

    const search = document.getElementById('account-search')
        .value.toLowerCase().trim();

    const roleFilter = document.getElementById('account-role-filter').value;
    const statusFilter = document.getElementById('account-status-filter').value;

    const filteredAccounts = accounts.filter(user => {
        const matchesSearch =
            user.name.toLowerCase().includes(search) ||
            user.email.toLowerCase().includes(search);

        const matchesRole =
            roleFilter === 'all' || user.role === roleFilter;

        const active = isActive(user.is_active);

        const matchesStatus =
            statusFilter === 'all' ||
            (statusFilter === 'active' && active) ||
            (statusFilter === 'inactive' && !active);

        return matchesSearch && matchesRole && matchesStatus;
    });

    if (filteredAccounts.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-muted py-4">
                    No accounts found.
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = filteredAccounts.map(user => {
        const active = isActive(user.is_active);

        const statusBadge = active
            ? '<span class="badge bg-success-subtle text-success">Active</span>'
            : '<span class="badge bg-secondary-subtle text-secondary">Inactive</span>';

        const roleBadge = user.role === 'photographer'
            ? '<span class="badge bg-info-subtle text-info">Photographer</span>'
            : '<span class="badge bg-primary-subtle text-primary">Client</span>';

        return `
            <tr>
                <td class="fw-medium">${escapeHTML(user.name)}</td>
                <td>${escapeHTML(user.email)}</td>
                <td>
                    ${roleBadge}
                </td>
                <td>
                    ${statusBadge}
                </td>
                <td>
                    <div class="d-flex flex-wrap gap-2">

                        <select class="form-select form-select-sm"
                            style="width:140px"
                            onchange="changeUserRole(${user.id}, '${user.role}', this.value)">
                            <option value="client" ${user.role === 'client' ? 'selected' : ''}>
                                Client
                            </option>
                            <option value="photographer" ${user.role === 'photographer' ? 'selected' : ''}>
                                Photographer
                            </option>
                        </select>

                        <button class="btn btn-sm ${active ? 'btn-outline-danger' : 'btn-outline-success'}"
                            onclick="toggleUserStatus(${user.id}, ${active})">
                            ${active ? 'Deactivate' : 'Activate'}
                        </button>

                    </div>
                </td>
            </tr>
        `;
    }).join('');
}

async function changeUserRole(userId, currentRole, newRole) {
    if (currentRole === newRole) return;

    const confirmed = confirm(
        `Change this account from ${currentRole} to ${newRole}?`
    );

    if (!confirmed) {
        renderAccounts();
        return;
    }

    try {
        const response = await fetch(`${AUTH_API}/admin/users/${userId}/role`, {
            method: 'PATCH',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${getToken()}`
            },
            body: JSON.stringify({ role: newRole })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Failed to update role.');
        }

        showMessage(data.message || 'Role updated successfully.', 'success');
        await loadAccounts();

    } catch (error) {
        showMessage(error.message);
        renderAccounts();
    }
}

async function toggleUserStatus(userId, currentStatus) {
    const action = currentStatus ? 'deactivate' : 'activate';

    if (!confirm(`Are you sure you want to ${action} this account?`)) {
        return;
    }

    try {
        const response = await fetch(`${AUTH_API}/admin/users/${userId}/status`, {
            method: 'PATCH',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${getToken()}`
            },
            body: JSON.stringify({
                is_active: !currentStatus
            })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Failed to update account status.');
        }

        showMessage(data.message || 'Account status updated.', 'success');
        await loadAccounts();

    } catch (error) {
        showMessage(error.message);
    }
}

// Search & filters
document.getElementById('account-search')
    .addEventListener('input', renderAccounts);

document.getElementById('account-role-filter')
    .addEventListener('change', renderAccounts);

document.getElementById('account-status-filter')
    .addEventListener('change', renderAccounts);

document.querySelectorAll('[data-dashboard-section]').forEach(button => {
    button.addEventListener('click', () => {
        const section = button.dataset.dashboardSection;
        openDashboardSection(section);
        if (section === 'reviews') loadReviews();
    });
});

document.getElementById('retry-reviews-button')
    .addEventListener('click', () => loadReviews(true));

document.getElementById('logout-button')
    .addEventListener('click', logoutAdmin);


// Add Photographer
document.getElementById('add-photographer-form')
    .addEventListener('submit', async function (event) {

        event.preventDefault();

        const form = this;
        const submitButton = document.getElementById('add-photographer-submit');
        const messageContainer = document.getElementById('add-photographer-message');

        const formData = new FormData(form);

        submitButton.disabled = true;
        submitButton.textContent = 'Creating...';
        messageContainer.innerHTML = '';

        try {
            const response = await fetch(`${AUTH_API}/admin/photographers`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${getToken()}`
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                let message = data.message || 'Failed to create photographer.';

                if (data.errors) {
                    message = Object.values(data.errors).flat().join(' ');
                }

                throw new Error(message);
            }

            messageContainer.innerHTML = `
                <div class="alert alert-success">
                    Photographer created successfully!
                </div>
            `;

            form.reset();

            await loadAccounts();

            setTimeout(() => {
                const modalElement = document.getElementById('addPhotographerModal');
                const modal = bootstrap.Modal.getInstance(modalElement);
                modal?.hide();
                messageContainer.innerHTML = '';
            }, 800);

        } catch (error) {
            messageContainer.innerHTML = `
                <div class="alert alert-danger">
                    ${escapeHTML(error.message)}
                </div>
            `;
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Create Photographer';
        }
    });

// Verify the stored token and role before showing the dashboard or loading accounts.
authorizeAdminPage().then(authorized => {
    if (authorized) loadAccounts();
});

window.addEventListener('pageshow', event => {
    if (!event.persisted) return;

    document.getElementById('admin-dashboard').hidden = true;
    authorizeAdminPage().then(authorized => {
        if (authorized) loadAccounts();
    });
});
</script>
@endpush
