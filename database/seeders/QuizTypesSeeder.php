<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QuizTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('quiz_types')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('quiz_types')->insert([
            ['id' => 1, 'title' => 'Quiz wiedzy', 'slug' => 'quiz-wiedzy', 'description' => 'Quiz, w którym tylko jedna odpowiedź jest poprawna', 'color' => '#10b981'],
            ['id' => 2, 'title' => 'Quiz na czas', 'slug' => 'quiz-na-czas', 'description' => 'Quiz, w którym określony jest czas na odpowiedź', 'color' => '#187de4'],
            ['id' => 3, 'title' => 'Zagadka', 'slug' => 'zagadka', 'description' => 'Zagadka to główkowanie. Odpowiedź nie zawsze jest jasna i oczywista', 'color' => '#7337ee'],
            ['id' => 4, 'title' => 'Psychotest', 'slug' => 'psychotest', 'description' => 'Quiz, w którym wyniki quizu przypisane są do odpowiedzi', 'color' => '#f97316'],
            ['id' => 5, 'title' => 'Co wolisz?', 'slug' => 'co-wolisz', 'description' => 'Quiz, w którym uczestnicy głosują na odpowiedzi', 'color' => '#ef4444'],
        ]);
    }
}
