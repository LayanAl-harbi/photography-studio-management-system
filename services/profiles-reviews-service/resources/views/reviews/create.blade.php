<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>

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

                <h2 class="mb-4">Add Review</h2>

                <form>

                    <div class="mb-3">
                        <label class="form-label">
                            Booking ID
                        </label>

                        <input type="number"
                               name="booking_id"
                               class="form-control"
                               min="1"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Photographer ID
                        </label>

                        <input type="number"
                               name="photographer_id"
                               class="form-control"
                               min="1"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Rating
                        </label>

                        <select name="rating"
                                class="form-select"
                                required>

                            <option value="">
                                Select Rating
                            </option>

                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Comment (Optional)
                        </label>

                        <textarea name="comment"
                                  class="form-control"
                                  rows="4"
                                  maxlength="1000"></textarea>
                    </div>

                    <button type="button"
                            class="btn btn-dark"
                            disabled>
                        Submit Review
                    </button>

                </form>

                <p class="text-muted mt-3">
                    Reviews can be submitted only after
                    a photography session is completed.
                </p>

            </div>
        </div>

    </div>

</body>
</html>
