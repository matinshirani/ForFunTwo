<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AuthorApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic')->except(['index', 'show']);
    }

    public function index(){
        $authors=Author::all();
        return ['data', $authors];
    }

    public function show($id){
        $author=Author::findOrFail($id);
        return ['data' ,$author];
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required | string | max:256',
            'birthday' => 'required | date'
        ]);
        $author=Author::create($request->except('_token'));
        return response()->json(['data' => $author, HttpResponse::HTTP_CREATED]);
    }

    public function update(Request $request, $id){
        $author=Author::find($id);
        $authoreUpdated = $author->update($request->only(['name', 'birthday']));
        return response()->json(['data', $authoreUpdated], HttpResponse::HTTP_CREATED);
    }

    public function destroy($id){
        Author::find($id)->delete();
    }
}
