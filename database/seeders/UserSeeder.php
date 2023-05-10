<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create()->each(function ($user){
                $book = $user->books()->create(Book::factory()->make()->toArray());
                $book->categories()->attach([1,2]);
                $book->authors()->attach(1);
            });
    }
}
