
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow border-0">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Welcome Back</h2>

                <div id="responseMessage"></div>

                <form id="loginForm">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control"
                               id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control"
                               id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Login
                    </button>

                </form>

                <p class="text-center mt-3 mb-0">
                    Don't have an account?
                    <a href="{{ route('register') }}">Register</a>
                </p>

            </div>
        </div>

    </div>
</div>

@endsection


@push('scripts')
<script>
document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const form = event.target;
    const responseMessage = document.getElementById('responseMessage');

    const formData = {
        email: form.email.value,
        password: form.password.value
    };

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

        responseMessage.replaceChildren();

        const alert = document.createElement('div');
        alert.className = response.ok
            ? 'alert alert-success'
            : 'alert alert-danger';

        alert.textContent = data.message || 'Something went wrong.';
        responseMessage.appendChild(alert);

        if (response.ok) {
            // Save the API token for authenticated requests.
            sessionStorage.setItem('auth_token', data.token);

            // Save basic user information.
            sessionStorage.setItem('user', JSON.stringify(data.user));

            form.reset();
        }

    } catch (error) {
        responseMessage.textContent = 'Unable to connect to the server.';
        responseMessage.className = 'alert alert-danger';
    }
});
</script>
@endpush
