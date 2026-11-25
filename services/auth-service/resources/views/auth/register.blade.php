
@extends('layouts.app')

@section('title', 'Create Account | Atelier Frame')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="text-center mb-4">
            <p class="eyebrow">JOIN THE STUDIO</p>
            <h1 class="display-5 fw-semibold">Your story starts here.</h1>
            <p class="text-muted">
                Create an account and begin your photography journey with us.
            </p>
        </div>

        <div class="studio-card p-4 p-md-5">

            <h2 class="h3 mb-2">Create an Account</h2>
            <p class="text-muted mb-4">
                Fill in your details to become part of Atelier Frame.
            </p>

            <div id="responseMessage"></div>

            <form id="registerForm">

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Enter your password again"
                        required>
                </div>

                <button type="submit" id="registerButton" class="btn btn-brown w-100">
                    Create Account
                </button>

            </form>

            <div class="text-center mt-4">
                <p class="mb-0">
                    Already have an account?
                    <a href="{{ route('login') }}" class="fw-semibold">
                        Login
                    </a>
                </p>
            </div>

        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('registerForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const form = event.target;
    const responseMessage = document.getElementById('responseMessage');
    const registerButton = document.getElementById('registerButton');

    const formData = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        password_confirmation: form.password_confirmation.value
    };

    registerButton.disabled = true;
    registerButton.textContent = 'Creating Account...';

    try {
        const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        if (response.ok) {
            responseMessage.innerHTML = `
                <div class="alert alert-success">
                    ${data.message}
                </div>
            `;

            form.reset();
        } else {
            let errors = '';

            if (data.errors) {
                errors = Object.values(data.errors)
                    .flat()
                    .map(error => `<li>${error}</li>`)
                    .join('');
            } else {
                errors = `<li>${data.message || 'Registration failed.'}</li>`;
            }

            responseMessage.innerHTML = `
                <div class="alert alert-danger">
                    <ul class="mb-0">${errors}</ul>
                </div>
            `;
        }

    } catch (error) {
        responseMessage.innerHTML = `
            <div class="alert alert-danger">
                Something went wrong. Please try again.
            </div>
        `;
    } finally {
        registerButton.disabled = false;
        registerButton.textContent = 'Create Account';
    }
});
</script>
@endpush
