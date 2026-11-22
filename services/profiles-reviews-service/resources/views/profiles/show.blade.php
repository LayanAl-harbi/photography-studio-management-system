<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">
                Photography Studio
            </span>
        </div>
    </nav>

    <div class="container py-5">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h2 class="mb-4">User Profile</h2>

                <p>
                    <strong>User ID:</strong> {{ $id }}
                </p>

                @if($profile)
                    <p>
                        <strong>Phone:</strong>
                        {{ $profile->phone ?? 'Not provided' }}
                    </p>

                    <p>
                        <strong>Address:</strong>
                        {{ $profile->address ?? 'Not provided' }}
                    </p>
                @else
                    <div class="alert alert-info">
                        No profile information available yet.
                    </div>
                @endif

            </div>
        </div>

    </div>

</body>
</html>
