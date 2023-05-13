<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


class CategoryApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic')->except('index');
    }

    public function index(){
        $categories=Category::all();
        return ['date', $categories];
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $category=Category::create($request->except('_token'));
        return response()->json(['data' => $category], HttpResponse::HTTP_CREATED);
    }

    public function destroy($id){
        Category::find($id)->delete();
    }
}
