@extends('layouts.app')
@section('content')
    <div style="border: 3px solid #48484e; margin: 100px auto; width: 300px; border-radius: 5px; padding: 5px;">
    @foreach($categories as $category)
        <form method="post" action="{{route('categories.destroy', ['category' => $category->id])}}">
            @csrf
            @method('delete')
            <td>{{$category->name}}</td>

            <td>
                <button style="color: darkred">Delete</button>
            </td>
        </form>
    @endforeach
        <div>
            <button style="background-color: blueviolet; border-radius: 3px;">
                <a  href="{{route('categories.create')}}">Create</a>
            </button>
        </div>
    <div>
@endsection
