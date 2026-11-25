
@extends('layouts.app')

@section('title', 'Admin Dashboard')


@section('content')

<div id="admin-dashboard" hidden>
<div class="container-fluid py-4">

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Studio Dashboard</h2>
            <p class="text-muted mb-0">Manage studio accounts and users</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-dark px-3 py-2">Admin</span>
            <button type="button" class="btn btn-outline-dark" id="logout-button">
                Logout
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Total Users</p>
                    <h3 class="fw-bold mb-0" id="total-users-count">0</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Clients</p>
                    <h3 class="fw-bold mb-0" id="clients-count">0</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Photographers</p>
                    <h3 class="fw-bold mb-0" id="photographers-count">0</h3>
                </div>
            </div>
        </div>

    </div>

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
