@extends('layout')

@section('content')
	<div class="row form_invisible" id="books_container">
		<div class="col-md-6 col-md-offset-3">
			<h1>Books:</h1> <span class="x_add_book btn btn-primary" >Add a Book!</span>
			<div class="x_new_form">
				<h3>Add new Book</h3>
			    <form method="POST" accept-charset="utf-8" action="books">
			    	<div class="form-group">
			    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" placeholder="Title" name="title">
					</div>
			    	<div class="form-group">
			    		<label for="author">Author</label>
			    		<input name="author" class="form-control" id="author" placeholder="Author"></input>
			    	</div>
			    	<div class="form-group">
			    		<label for="publication_date">Publication Date</label>
			    		<input name="publication_date" class="form-control" placeholder="Publication date" type="date"></input>
			    	</div>
			    	<div class="form-group">
			    		
			    		<button  class="btn btn-primary ">Add Book</button>
			    		<span  class="btn x_cancel">Cancel</span>
			    	</div>
			    	@if (count($errors))
				    	<div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
			    	
			    </form>
				<hr>
			</div>

			
			<table class="table" id="books_list">
				<thead>
			      <tr>
			        <th>Title</th>
			        <th>Author <a href="/books/sort/author/desc"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" ></span></a><a href="/books/sort/author/asc"><span class="glyphicon glyphicon-triangle-top " aria-hidden="true" ></span></a></th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach ($books as $book)
				    	<tr id="{{ $book->id }}">
				    		<td><a href="/books/{{ $book->id }}"> {{ $book->title }}</a></td>
				    		<td>{{ $book->author }}</td>
				    	</tr>
				    @endforeach
			    </tbody>
			</table>
			
		    
		</div>
	</div>
    
@stop