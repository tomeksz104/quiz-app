<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            QuizTypesSeeder::class,
            CategoriesSeeder::class,
            UsersSeeder::class,
            QuizzesSeeder::class,
            //QuizCategoriesSeeder::class,
            QuestionsSeeder::class,
            AnswersSeeder::class,
            ResultMessagesSeeder::class,
            ImagesSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
