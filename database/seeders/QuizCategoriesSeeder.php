<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_categories')->truncate();

        DB::table('quiz_categories')->insert([
            ['quiz_id' => 1, 'category_id' => 2],
            ['quiz_id' => 2, 'category_id' => 3],
            ['quiz_id' => 3, 'category_id' => 3],
            ['quiz_id' => 4, 'category_id' => 6],
            ['quiz_id' => 5, 'category_id' => 3],
            ['quiz_id' => 6, 'category_id' => 1],
            ['quiz_id' => 7, 'category_id' => 1],
            ['quiz_id' => 8, 'category_id' => 14],
            ['quiz_id' => 9, 'category_id' => 14],
            ['quiz_id' => 10, 'category_id' => 7],
            ['quiz_id' => 11, 'category_id' => 10],
            ['quiz_id' => 12, 'category_id' => 15],
            ['quiz_id' => 13, 'category_id' => 9],
            ['quiz_id' => 14, 'category_id' => 5],
            ['quiz_id' => 15, 'category_id' => 5],
            ['quiz_id' => 16, 'category_id' => 9],
            ['quiz_id' => 17, 'category_id' => 4],
            ['quiz_id' => 18, 'category_id' => 11],
            ['quiz_id' => 19, 'category_id' => 12],
            ['quiz_id' => 20, 'category_id' => 12],
            ['quiz_id' => 21, 'category_id' => 10],
            ['quiz_id' => 22, 'category_id' => 8],
            ['quiz_id' => 23, 'category_id' => 16],
        ]);
    }
}
