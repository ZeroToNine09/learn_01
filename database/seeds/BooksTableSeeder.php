<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();

        $books = [
            'Book 1',
            'Book 2',
            'Book 3',
        ];

        foreach ($books as $key => $book) {
            DB::table('books')->insert([
                'no' => $key + 1,
                'created_user_id' => $key + 1,
                'title' => $book,
                'start_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
