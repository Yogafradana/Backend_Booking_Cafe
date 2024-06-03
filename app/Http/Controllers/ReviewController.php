<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function show($id)
{
    $review = Review::find($id); // Anda perlu mengganti 'Review' dengan nama model yang sesuai
    return view('reviews.detailulasan', compact('review'));
}

}
