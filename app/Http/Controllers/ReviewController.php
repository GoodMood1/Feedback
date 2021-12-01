<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $title = 'Reviews';
        $review = Review::all();

        return view('reviews', compact('title', 'review'));
    }
    public function setReview(Request $request){
        $review = new Review();
        $request->validate([
            'login' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        $review->login = $request->login;
        $review->content = $request->content;
        $review->save();
        return redirect('/review');
    }
}
