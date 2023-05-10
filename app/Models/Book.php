<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    protected $fillable = ['name', 'pages', 'ISBN', 'price', 'published_at'];
}
