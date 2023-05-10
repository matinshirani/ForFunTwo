@extends('layouts.app')
@section('content')
    <div style="border: 3px solid #48484e; margin: 100px auto; width: 300px; border-radius: 5px; padding: 5px;">
        <table>
        @foreach($authors as $author)
            <tr>
                <td>
                    <a href="{{route('authors.show', ['author' => $author->id])}}">
                        {{$author->name}}
                    </a>
                </td>
                <td>
                    <button style="color: forestgreen;margin-right: 10px;"><a href="{{route('authors.edit', ['author' => $author->id])}}">update</a></button>
                </td>
                <form action="{{route('authors.destroy', ['author' => $author->id])}}" method="post">
                    @method('delete')
                    {{csrf_field()}}
                    <td>
                        <button style="color: darkred">delete</button>
                    </td>

                </form>
                </tr>
            @endforeach
        </table>
            <div>
                <button style="background-color: blueviolet; border-radius: 3px;">
                    <a  href="{{route('authors.create')}}">Create</a>
                </button>
            </div>

    </div>
@endsection

