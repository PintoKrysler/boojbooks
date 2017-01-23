<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Book;
use App\Review;
use GuzzleHttp\Client;

class BooksController extends Controller
{

    public function home(){

    	return view('welcome');
    }

	/**
     * Function index
     * This function gets all the books sorted sorted by 'sort' attribute
     * and returns the view that is going to display all the books
     */
    public function index(){
    	$books = DB::table('books')->orderBy('sort', 'ASC')->get();
    	return view('books.index',compact('books'));
    }

    /**
     * Function show
     * This function returns the view with the book's detail
     * @param Book: Book which information is going to be shown
     */
    public function show(Book $book){
    	return view('books.show',compact('book'));
    }


    /**
     * Function add
     * This function adds a Book to the books table
     * @param Request $request : Request passed during form submission
     */
    public function add(Request $request ){
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
    	$new_book->sort=DB::table('books')->count() + 1;
    	$new_book->save();

    	return back();
    }

    /**
     * Function edit
     * This function returns the view that is going to allow
     * the user to edit the book information
     * @param Book : book that is going to be edited
     */
    public function edit(Book $book){
    	return view('books.edit', ['book'=>$book] );
    }

    /**
     * Function update
     * This function updates a book information
     * @param  Request : Request passed during form submit
     * @param  Book : Book to update
     */
    public function update(Request $request,Book $book){
    	// Update book    	
    	$book->update([
    		'title'=>$request->title,
    		'author'=>$request->author,
    		'publication_date'=>$request->publication_date,
    	]);
    	return back();
    }

    /**
     * Function sort
     * This function sorts the books by the attribute passed
     * as a parameter and in 'DESC' or 'ASC' order, depending on the second parameter
     * @param string : book attribute that we want to sort by
     * @param string : 'DESC' or 'ASC' defines how to order the books
     */
    public function sort(String $field,String $order){
    	$books = DB::table('books')->orderBy($field, $order)->get();
    	return view('books.index',compact('books'));
    }

    /**
     * Function updateorder
     * This function updates the 'sort' attribute on each book passed on the list
     * @param  String $orderlist : this is an ordered list of book identificators
     */
    public function updateorder(String $orderlist){
    	$list = explode(',', $orderlist);

    	foreach ($list as $order => $book_id) {
    		// Update sort value of each book
    		DB::table('books')->where('id',$book_id)->update(['sort'=>$order]);
    	}
    }

    public function apisearch(String $search){

		$client = new Client([
		    // Base URI is used with relative requests
		    'base_uri' => 'http://httpbin.org',
		    // You can set any number of default request options.
		    'timeout'  => 2.0,
		]);

		$client = new GuzzleHttp\Client(['base_uri' => 'https://www.googleapis.com/books/v1']);
		// Send a request to https://foo.com/api/test
		$response = $client->request('GET', 'volumes?q='.$search);
		return $response;
	}

}
