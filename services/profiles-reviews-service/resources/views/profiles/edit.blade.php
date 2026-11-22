<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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

                <h2 class="mb-4">Edit Profile</h2>

                <form>

                    <div class="mb-3">
                        <label class="form-label">
                            Phone Number
                        </label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               maxlength="20">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Address
                        </label>
                        <input type="text"
                               name="address"
                               class="form-control"
                               maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Profile Image Path
                        </label>
                        <input type="text"
                               name="profile_image"
                               class="form-control"
                               maxlength="255">
                    </div>

                    <button type="button"
                            class="btn btn-dark"
                            disabled>
                        Save Changes
                    </button>

                </form>

                <p class="text-muted mt-3">
                    Profile editing will be enabled after
                    authentication integration.
                </p>

            </div>
        </div>

    </div>

</body>
</html>
