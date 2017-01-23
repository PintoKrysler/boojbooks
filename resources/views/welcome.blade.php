@extends('layout')

@section('content')
	<div class="page-header">
	  <h1>Booj List of Books <small>by Krysler A. Pinto</small></h1>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<p class="lead">
				This site was created using Laravel framework. It allows the user to perform the following actions:
				<ul class="list-group">
		            <li class="list-group-item">Add a Book</li>
		            <li class="list-group-item">Display a book detail</li>
		           	<li class="list-group-item">Edit a Book description</li>
		           	<li class="list-group-item">Change the order of the books</li>
		           	<li class="list-group-item">Add a Review to a book</li>
		           	<li class="list-group-item">Sort the list of books by their author</li>
		        </ul>
			</p>
			<a class="btn btn-primary x_checkitout" style="float:right" href="/books">Check it out!</a>
		</div>
	</div>
@stop