<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function show($id){
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }

    public function create(){
        return view('authors.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required | string | max:256',
            'birthday' => 'required | date'
        ]);

        Author::create($request->except('_token'));

        return redirect('/authors');
    }

    public function edit($id){
        $author=Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id){
        $author=Author::find($id);
        $author->update($request->only(['name', 'birthday']));
        return redirect('/authors');
    }

    public function destroy($id){
        $author=Author::find($id);
        $author->delete();
        return redirect('/authors');
    }
}
