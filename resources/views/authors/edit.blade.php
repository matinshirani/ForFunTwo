@extends('layouts.app')
@section('content')
    <div style="border: 3px solid #48484e; margin: 100px auto; width: 350px; border-radius: 5px; padding: 5px;">
        <form action="{{route('authors.update', ['author' => $author->id])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <div>
                    <label for="formGroupExampleInput">{{__('messages.name')}}</label>
                </div>
                <input value="{{$author->name}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="name" type="text" class="form-control" id="formGroupExampleInput" required>
            </div>
            <div class="form-group">
                <div>
                    <label for="formGroupExampleInput">{{__('messages.birthday')}}</label>
                </div>
                <input value="{{$author->birthday}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="birthday" type="date" class="form-control" id="formGroupExampleInput" required>
            </div>


            <input type="submit" style="background-color: blueviolet; border-radius: 3px;" />
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </div>
@endsection
