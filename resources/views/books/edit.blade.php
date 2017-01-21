@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
	    	<h1>Edit Book </h1>
	    	<hr>
	    	<form method="POST" accept-charset="utf-8" action="/books/{{ $book->id }}">
	    		{{ method_field('PATCH') }}
	    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	<div class="form-group">
		    		<input name="title" class="form-control" value="{{ $book->title }}"></input>
		    		<input name="author" class="form-control" value="{{ $book->author }}"></input>
		    		<input name="publication_date" class="form-control" value="{{ $book->publication_date }}"></input>
		    	</div>
		    	<div class="form-group">
		    		<button type="submit" class="btn btn-primary">Update Book</button>
		    	</div>
		    	
		    </form>
	    </div>
    </div>
@stop