@extends('layouts.app')
@section('content')
    <h1><strong>{{$book->name}}</strong></h1>
    <h2>Pages : {{$book->pages}}</h2>
    Price : <i>{{$book->price}}</i>
    <p>ISBN : {{$book->ISBN}}</p>
    <p>Published_at : {{$book->published_at}}</p>
    <h2><b>User</b> : {{$book->user->name}}</h2>
    <h3>Email :{{$book->user->email}}</h3>
    <h3>National code :{{$book->user->national_code}}</h3>
    <h2><b>Categories</b> :</h2>
    @foreach($book->categories as $category)
        <h3>{{$category->name}}</h3>
    @endforeach
    <h2><b>Authors</b> :</h2>
    @foreach($book->authors as $author)
        <h3>{{$author->name}}</h3>
        <h3>{{$author->birthday}}</h3>
    @endforeach
@endsection
