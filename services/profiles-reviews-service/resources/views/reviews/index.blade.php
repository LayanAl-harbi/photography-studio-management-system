<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Reviews</title>

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
        <h2 class="mb-4">Photographer Reviews</h2>

        <div class="row">
            @forelse($reviews as $review)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <h5 class="card-title">
                                Photographer #{{ $review->photographer_id }}
                            </h5>

                            <p class="text-warning fs-4">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </p>

                            <p class="card-text">
                                {{ $review->comment ?? 'No comment provided.' }}
                            </p>

                            <small class="text-muted">
                                {{ $review->created_at->format('d M Y') }}
                            </small>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No reviews available yet.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
