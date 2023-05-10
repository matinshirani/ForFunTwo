<?php

namespace App\Http\Controllers;

use App\Mail\BookStored;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Providers\BookStoredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id){
        $book=Book::with(['user', 'categories', 'authors'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create(){
        $categories = Category::all();
        $authors = Author::all();
        return view('books.create', compact('categories', 'authors'));
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
        $user=Auth::user();
        event(new BookStoredEvent($book, $user));

        return redirect(route('books.index'));
    }

    public function edit($id){
        $book = Book::find($id);
        $this->authorize('update', $book);
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    public function update(Request $request, $id){
        $book= Book::find($id);
        $book->update($request->only(['name', 'pages', 'ISBN', 'price', 'published_at']));
        $book->categories()->sync($request->get('category_id'));
        $book->authors()->sync($request->get('author_id'));

        return redirect('/books');
    }

    public function destroy($id){
        $book=Book::find($id);
        $this->authorize('delete', $book);
        $book->delete();
        return redirect('/books');
    }
}
