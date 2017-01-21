<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Book;

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
}
