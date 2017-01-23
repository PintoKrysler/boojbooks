<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
	/**
	 * This function adds a Review to a Book
	 * @param Request $request : Request sent during form submission
	 * @param Book    $book    : Book to be added
	 */
    public function add(Request $request, Book $book){
    	//return request()->all();
    	$r = new Review(['body'=>$request->body]);
    	$book->addReview($r);
    	return back();
    	
    }
}
