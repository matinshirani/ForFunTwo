<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpRepsonse;


class BookApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic')->except(['index', 'show']);
    }

    public function index(){
        $book = Book::with(['categories', 'authors'])->get();
        return ['data' => $book];
    }

    public function show($id){
        $book = Book::with(['categories', 'authors'])->findOrFail($id);
        return ['data' => $book];
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required | string | max:256',
            'pages' => 'required | numeric',
            'ISBN' => 'required | string | size:10',
            'price' => 'required | numeric',
            'published_at' => 'required | date'
        ]);

        $book=Auth::user()->books()->create($request->except('_token'));
        $book->categories()->attach($request->get('category_id'));
        $book->authors()->attach($request->get('author_id'));
        return response()->json(['data' => $book], HttpRepsonse::HTTP_CREATED);
    }

    public function update(Request $request, $id){
        $book=Book::with(['categories', 'authors'])->find($id);
        $bookUpdated=$book->update($request->only(['name', 'pages', 'ISBN', 'price', 'published_at']));
        $book->categories()->sync($request->get('category_id'));
        $book->authors()->sync($request->get('author_id'));

        return response()->json(['data' => $bookUpdated], HttpRepsonse::HTTP_CREATED);
    }

    public function destroy($id){
        Book::find($id)->delete();
    }
}
