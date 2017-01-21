@extends('layout')

@section('content')
    <h1>Books:</h1>
    @foreach ($books as $book)
    	<div> <a href="/books/{{ $book->id }}"> {{ $book->title }} </a></div>
    @endforeach
    <hr>
    <h3>Add new Book</h3>
    <form method="POST" accept-charset="utf-8" action="books">
    	<div class="form-group">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		<input name="title" class="form-control"></input>
    		<input name="author" class="form-control"></input>
    		<input name="publication_date" class="form-control"></input>

    	</div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-primary">Add Book</button>
    	</div>
    	
    </form>
@stop