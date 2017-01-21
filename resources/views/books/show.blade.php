@extends('layout')

@section('content')
    <h1>Book Info:</h1>
    	<div>{{ $book->id }}</div>
    	<div>{{ $book->title }}</div>
@stop