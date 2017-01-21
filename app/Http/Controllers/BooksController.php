<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Book;
use App\Review;

class BooksController extends Controller
{
    public function index(){
    	$books = Book::all();
    	//$books = DB::table('books')->get();
    	return view('books.index',compact('books'));
    }

    public function show(Book $book){
    	//first way
    	//$book = Book::find($bookid);
    	//return $book;
    	return view('books.show',compact('book'));
    }

    public function add(Request $request ){
    	//return request()->all();
    	$this->validate($request,[
    		'title'=>'required',
    		'author'=>'required',
    		'publication_date'=>'required',
    	]);
    	// Add a new book to collection of books
    	$new_book = new Book;
    	$new_book->title = $request->title;
    	$new_book->author=$request->author;
    	$new_book->publication_date=$request->publication_date;
    	
    	$new_book->save();
    	return back();
    	// $review = new Review();
    	// $review->body = $request->body;
    	// $review->book_id=
    }

    public function edit(Book $book){
    	//return $book;
    	return view('books.edit', ['book'=>$book] );
    }

    public function update(Request $request,Book $book){

    	// Update book    	
    	$book->update([
    		'title'=>$request->title,
    		'author'=>$request->author,
    		'publication_date'=>$request->publication_date,
    	]);
    	return back();
    	// $review = new Review();
    	// $review->body = $request->body;
    	// $review->book_id=
    }

    public function sort(String $field,String $order){
    	$books = DB::table('books')->orderBy($field, $order)->get();

    	return view('books.index',compact('books'));
    }

}
