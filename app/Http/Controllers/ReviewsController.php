<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function add(Request $request, Book $book){
    	//return request()->all();
    	$r = new Review(['body'=>$request->body]);
    	$book->addReview($r);
    	return back();
    	
    }
}
