@extends('layouts.app')
@section('content')
<div style="border: 3px solid #48484e; margin: 100px auto; width: 350px; border-radius: 5px; padding: 5px;">
    <form action="{{route('books.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="formGroupExampleInput">{{__('messages.name')}}</label>
            </div>
            <input value="{{old('name')}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="name" type="text" class="form-control" id="formGroupExampleInput" required>
        </div>
        <div class="form-group">
            <div>
                <label for="formGroupExampleInput2">{{__('messages.pages')}}</label>
            </div>
            <input value="{{old('pages')}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; "  name="pages" type="number" class="form-control" id="formGroupExampleInput2" required>
        </div>
        <div class="form-group">
            <div>
                <label for="formGroupExampleInput2">{{__('messages.isbn')}}</label>
            </div>
            <input value="{{old('ISBN')}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="ISBN" type="text" class="form-control" id="formGroupExampleInput2" required>
        </div>
        <div class="form-group">
            <div>
                <label for="formGroupExampleInput2">{{__('messages.price')}}</label>
            </div>
            <input value="{{old('price')}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="price" type="number" class="form-control" id="formGroupExampleInput2" required>
        </div>
        <div class="form-group">
            <div>
                <label for="formGroupExampleInput2">{{__('messages.publish')}}</label>
            </div>
            <input value="{{old('published_at')}}" style="border-radius: 7px ; margin: 5px; border:3px solid grey; " name="published_at" type="date" class="form-control" id="formGroupExampleInput2" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">{{__('messages.category')}}</label>
            <select name="category_id[]" multiple>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">{{__('messages.authors')}}</label>
            <select name="author_id[]" multiple>
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
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
