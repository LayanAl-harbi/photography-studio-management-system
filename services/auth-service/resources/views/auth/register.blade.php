
@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow border-0">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Create an Account</h2>

                <div id="responseMessage"></div>
                <form id="registerForm">
                

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control"
                               id="name" name="name"
                               value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control"
                               id="email" name="email"
                               value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control"
                               id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" class="form-control"
                               id="password_confirmation"
                               name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Register
                    </button>
                </form>

                <p class="text-center mt-3 mb-0">
                    Already have an account?
<a href="#">Login</a>                </p>

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

    const formData = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        password_confirmation: form.password_confirmation.value
    };

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
    }
});
</script>
@endpush