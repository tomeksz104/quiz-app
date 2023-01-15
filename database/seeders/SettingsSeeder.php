<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        DB::table('settings')->insert([
            [
                'id' => 1,
                'page_title' => 'Quizuj.my',
                'about_footer' => 'Quzujmy to portal zapewniający świetną rozrywkę. Każdy użytkownik może utworzyć swój quiz, a przy odrobinie szczęścia trafi on na stronę główną! Nauka i zabawa w pigułce!',
                'copyright' => '© Copyright 2020 Quizujmy. All rights reserved.',

                'logo' => 'img/logo.png',
                'favicon' => 'img/favicon.ico',

                'youtube' => null,
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitch' => 'https://www.twitch.tv/',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
