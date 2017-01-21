@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
	    	<h1>{{ $book->title }}</h1>
	    	<h3>Author : {{ $book->author }}</h3>
	    	<h3>Publication Date : {{ $book->publication_date }}</h3>
	    	<ul class="list-group">
		    	@foreach ($book->reviews as $review)
		    		<li class="list-group-item">{{ $review->body }}</li>
		    	@endforeach
	    	</ul>
	    	<hr>

	    	<form method="POST" accept-charset="utf-8" action="/books/{{ $book->id}}/reviews">
	    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	<div class="form-group">
		    		<textarea name="body" class="form-control"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<button type="submit" class="btn btn-primary">Add Review</button>
		    	</div>
		    	
		    </form>
	    </div>
    </div>
@stop