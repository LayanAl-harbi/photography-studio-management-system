
@extends('layouts.app')

@section('title', 'Login | Atelier Frame')

@section('content')

<div class="row justify-content-center align-items-center py-4">
    <div class="col-md-8 col-lg-6">

        <div class="text-center mb-4">
            <div class="eyebrow mb-3">WELCOME BACK TO THE STUDIO</div>

            <h1 style="font-size: clamp(38px, 5vw, 58px);">
                Your story continues <em style="color:#9d7b69;">here.</em>
            </h1>

            <p class="text-secondary mt-3">
                Sign in to your account and step back into Atelier Frame.
            </p>
        </div>

        <div class="studio-card p-4 p-md-5">

            <div class="text-center mb-4">
                <span class="serif" style="font-size:26px;">Sign in</span>
                <p class="text-muted small mt-2 mb-0">
                    Enter your account details below.
                </p>
            </div>

            <div id="responseMessage"></div>

            <form id="loginForm">

                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">
                        Email address
                    </label>

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="you@example.com"
                           autocomplete="email"
                           required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">
                        Password
                    </label>

                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Enter your password"
                           autocomplete="current-password"
                           required>
                </div>

                <button type="submit" class="btn btn-brown w-100" id="loginButton">
                    Sign in to your account →
                </button>

            </form>

            <div class="text-center mt-4">
                <span class="text-muted">New to Atelier Frame?</span>
                <a href="{{ route('register') }}"
                   style="color:var(--brown); font-weight:700; text-decoration:none;">
                    Create an account
                </a>
            </div>

        </div>

        <p class="text-center mt-4 small" style="color:#e9d9c8;">
            A little bit of magic in every frame. ♡
        </p>

    </div>
</div>

@endsection

@push('scripts')
<script>
const PROFILES_REVIEWS_URL = @json(rtrim(config('services.profiles_reviews.url'), '/'));

document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const form = event.target;
    const responseMessage = document.getElementById('responseMessage');
    const loginButton = document.getElementById('loginButton');

    const formData = {
        email: form.email.value,
        password: form.password.value
    };

    loginButton.disabled = true;
    loginButton.textContent = 'Signing in...';

    responseMessage.replaceChildren();

    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        const alert = document.createElement('div');
        alert.className = response.ok
            ? 'alert alert-success'
            : 'alert alert-danger';

        alert.textContent = data.message || 'Something went wrong.';
        responseMessage.appendChild(alert);

        if (response.ok) {
            sessionStorage.setItem('auth_token', data.token);
            sessionStorage.setItem('user', JSON.stringify(data.user));

            const role = data.user?.role;
            form.reset();

            if (role === 'admin') {
                window.location.href = '/admin';
                return;
            }

            if (role === 'client' || role === 'photographer') {
                const handoffResponse = await fetch('/api/profile-handoff', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${data.token}`
                    }
                });
                const handoffData = await handoffResponse.json();

                if (!handoffResponse.ok || !handoffData.code) {
                    throw new Error(handoffData.message || 'Unable to continue to your profile.');
                }

                const handoffForm = document.createElement('form');
                handoffForm.method = 'POST';
                handoffForm.action = `${PROFILES_REVIEWS_URL}/auth/handoff`;

                const codeInput = document.createElement('input');
                codeInput.type = 'hidden';
                codeInput.name = 'code';
                codeInput.value = handoffData.code;
                handoffForm.appendChild(codeInput);
                document.body.appendChild(handoffForm);
                handoffForm.submit();
                return;
            }

            window.location.href = '/';
        }

    } catch (error) {
        const alert = document.createElement('div');
        alert.className = 'alert alert-danger';
        alert.textContent = error.message || 'Unable to connect to the server.';
        responseMessage.appendChild(alert);

    } finally {
        loginButton.disabled = false;
        loginButton.textContent = 'Sign in to your account →';
    }
});
</script>
@endpush
