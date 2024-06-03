@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <h3 class="text-center">Data Reviews</h3>
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->nama }}</td>
                            <td>
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </td>
                            <td>{{ $review->comment }}</td>
                            <td>
                                <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.footer')
