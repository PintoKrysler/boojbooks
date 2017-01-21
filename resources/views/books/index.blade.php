@extends('layout')

@section('content')
    <h1>Books:</h1>
    @foreach ($books as $book)
    	<div>{{ $book->title }}</div>
    @endforeach
@stop