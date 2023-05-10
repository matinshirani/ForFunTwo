@extends('layouts.app')
@section('content')
    <div style="border: 3px solid #48484e; margin: 100px auto; width: 300px; border-radius: 5px; padding: 5px;">
        <table>
            @foreach($books as $book)
                <tr>
                    <td>
                        <a href="{{route('books.show', ['book' => $book->id])}}">
                            {{$book->name}}
                        </a>
                    </td>
                    @can('update', $book)
                    <td>
                        <button style="color: forestgreen;margin-right: 10px;"><a href="{{route('books.edit', ['book' => $book->id])}}">update</a></button>
                    </td>
                    @else
                        <td></td>
                    @endcan
                    @can('delete', $book)
                    <td>
                        <form action="{{route('books.destroy', ['book' => $book->id])}}" method="post">
                            @method('delete')
                            {{csrf_field()}}

                                <button style="color: darkred">delete</button>
                        </form>
                    </td>
                    @else
                    <td></td>
                    @endcan
                </tr>
            @endforeach
        </table>
        <div>
            <button style="background-color: blueviolet; border-radius: 3px;">
                <a  href="{{route('books.create')}}">Create</a>
            </button>
        </div>
    </div>
@endsection
