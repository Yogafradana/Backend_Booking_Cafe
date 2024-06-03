@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Review Card -->
        <div class="card mb-3" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Ulasan</h5>
                <p class="card-text"><strong>Nama</strong> : {{ $review->nama }}</p>
                <p class="card-text"><strong>Bintang</strong> :
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $review->rating)
                            <i class="fas fa-star" style="color: gold;"></i>
                        @else
                            <i class="far fa-star" style="color: gold;"></i>
                        @endif
                    @endfor
                </p>
                <p class="card-text"><strong>Ulasan</strong> : {{ $review->comment }}</p>
                <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-info">Kembali</a>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')
</html>
