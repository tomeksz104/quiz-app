<?php

namespace Database\Seeders;

use App\Enums\QuizType;
use App\Enums\QuizWizardType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('result_messages')->truncate();

        DB::table('result_messages')->insert([
            ['id' => 1, 'title' => 'No cóż...', 'description' => '... widywaliśmy lepsze wyniki :) Może spróbujesz sił w innym quizie? :)', 'default' => 1, 'quiz_id' => null, 'rating_from' => 0],
            ['id' => 2, 'title' => 'Dobrze', 'description' => 'Zdarzyło Ci się kilka wpadek, jednak wyszedłeś z tego quizu obronną ręką. Możesz śmiało ruszać do następnego!', 'default' => 1, 'quiz_id' => null, 'rating_from' => 25],
            ['id' => 3, 'title' => 'Bardzo dobrze!', 'description' => 'Super! Ten quiz nie stanowił dla Ciebie dużego wyzwania - poradziłeś sobie z nim doskonale. Czy w następnym pójdzie Ci równie dobrze?', 'default' => 1, 'quiz_id' => null, 'rating_from' => 50],
            ['id' => 4, 'title' => 'Świetnie!', 'description' => 'Gratulacje! To był po prostu fantastyczny występ - tak trzymać! Czy w następnym quizie pójdzie Ci równie dobrze?', 'default' => 1, 'quiz_id' => null, 'rating_from' => 75],
            ['id' => 5, 'title' => 'Fenomenalnie!', 'description' => 'Należy Ci się pochwała od samego prezydenta! W tej dziedzinie jesteś najlepszy!', 'default' => 1, 'quiz_id' => null, 'rating_from' => 90],
        ]);
    }
}
