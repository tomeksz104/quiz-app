<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->truncate();

        DB::table('answers')->insert([
            ['id' => 1, 'title' => 'Powrót do przyszłości', 'correct' => 1, 'question_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'title' => 'Rambo II', 'correct' => 0, 'question_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'title' => 'Rocky 4', 'correct' => 0, 'question_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'title' => 'Asterix kontra Cezar', 'correct' => 0, 'question_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 5, 'title' => 'Miejsce na górze', 'correct' => 0, 'question_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'title' => 'Pamiętnik Anny Frank', 'correct' => 0, 'question_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'title' => 'Anatomia morderstwa', 'correct' => 0, 'question_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'title' => 'Ben-Hur', 'correct' => 1, 'question_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 9, 'title' => 'Żyj i pozwól umrzeć', 'correct' => 0, 'question_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, 'title' => 'Zabójczy widok', 'correct' => 0, 'question_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 11, 'title' => 'Operacja Piorun', 'correct' => 0, 'question_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 12, 'title' => 'Goldfinger ', 'correct' => 1, 'question_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 13, 'title' => 'Demian Bichir', 'correct' => 0, 'question_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 14, 'title' => 'Dean Dujardin', 'correct' => 1, 'question_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 15, 'title' => 'George Clooney', 'correct' => 0, 'question_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 16, 'title' => 'Gary Oldman', 'correct' => 0, 'question_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 17, 'title' => 'Kung Fu Panda 2', 'correct' => 0, 'question_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 18, 'title' => 'Rango', 'correct' => 1, 'question_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 19, 'title' => 'Kot w butach', 'correct' => 0, 'question_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 20, 'title' => 'Shrek', 'correct' => 0, 'question_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 21, 'title' => 'Mary Janes', 'correct' => 0, 'question_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 22, 'title' => 'Mary Poppins', 'correct' => 1, 'question_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 23, 'title' => 'Alladin', 'correct' => 0, 'question_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 24, 'title' => 'Little Mermaid', 'correct' => 0, 'question_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 25, 'title' => 'Kanał', 'correct' => 0, 'question_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 26, 'title' => 'Skarb', 'correct' => 0, 'question_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 27, 'title' => 'Ewa chce spać', 'correct' => 0, 'question_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 28, 'title' => 'Zakazane piosenki', 'correct' => 1, 'question_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 29, 'title' => 'Jerzy Kawalerowicz', 'correct' => 0, 'question_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 30, 'title' => 'Andrzej Wajda', 'correct' => 1, 'question_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 31, 'title' => 'Wojciech Jerzy Has', 'correct' => 0, 'question_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 32, 'title' => 'Skarb', 'correct' => 0, 'question_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 33, 'title' => 'Krzyżacy', 'correct' => 0, 'question_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 34, 'title' => 'Przygoda na Mariensztacie', 'correct' => 1, 'question_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 35, 'title' => 'Zezowate szczęście', 'correct' => 0, 'question_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 36, 'title' => 'Krzyżacy', 'correct' => 1, 'question_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 37, 'title' => 'Pan Wołodyjowski', 'correct' => 0, 'question_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 38, 'title' => 'Noce i dnie', 'correct' => 0, 'question_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 39, 'title' => 'Popiół i diament', 'correct' => 0, 'question_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 40, 'title' => 'Jerzy Kawalerowicz', 'correct' => 0, 'question_id' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 41, 'title' => 'Jerzy Hoffman', 'correct' => 0, 'question_id' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 42, 'title' => 'Roman Polański', 'correct' => 0, 'question_id' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 43, 'title' => 'Andrzej Wajda', 'correct' => 1, 'question_id' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 44, 'title' => '1920 Bitwa Warszawska', 'correct' => 0, 'question_id' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 45, 'title' => 'Ogniem i mieczem', 'correct' => 0, 'question_id' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 46, 'title' => 'Pan Tadeusz', 'correct' => 0, 'question_id' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 47, 'title' => 'Quo vadis', 'correct' => 1, 'question_id' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 48, 'title' => 'Hydrozagadka', 'correct' => 0, 'question_id' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 49, 'title' => 'Ostatni dzień lata', 'correct' => 0, 'question_id' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 50, 'title' => 'Rejs', 'correct' => 1, 'question_id' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 51, 'title' => 'Popiół i diament', 'correct' => 0, 'question_id' => 13, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 52, 'title' => 'Andrzej Wajda', 'correct' => 0, 'question_id' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 53, 'title' => 'Krzysztof Zanussi', 'correct' => 0, 'question_id' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 54, 'title' => 'Roman Polański', 'correct' => 1, 'question_id' => 14, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 55, 'title' => 'Rękopis znaleziony w Saragossie', 'correct' => 0, 'question_id' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 56, 'title' => 'Popiół i diament', 'correct' => 1, 'question_id' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 57, 'title' => 'Rozwodów nie będzie', 'correct' => 0, 'question_id' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 58, 'title' => 'Pokolenie', 'correct' => 0, 'question_id' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 59, 'title' => 'Małgorzata Braunek', 'correct' => 0, 'question_id' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 60, 'title' => 'Beata Tyszkiewicz', 'correct' => 1, 'question_id' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 61, 'title' => 'Anna Dymna', 'correct' => 0, 'question_id' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 62, 'title' => 'Barbara Brylskae', 'correct' => 0, 'question_id' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 63, 'title' => 'Bogusław Linda', 'correct' => 0, 'question_id' => 17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 64, 'title' => 'Jan Nowicki', 'correct' => 0, 'question_id' => 17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 65, 'title' => 'Tadeusz Łomnicki', 'correct' => 0, 'question_id' => 17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 66, 'title' => 'Daniel Olbrychski', 'correct' => 1, 'question_id' => 17, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 67, 'title' => 'Koronacja Bolesława Chrobrego ', 'correct' => 0, 'question_id' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 68, 'title' => 'Chrzest Mieszka I', 'correct' => 1, 'question_id' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 69, 'title' => 'Zawarcie Unii Brzeskiej', 'correct' => 0, 'question_id' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 70, 'title' => 'Chrzest Mieszka II', 'correct' => 0, 'question_id' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 71, 'title' => 'Warszawa', 'correct' => 0, 'question_id' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 72, 'title' => 'Kraków', 'correct' => 0, 'question_id' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 73, 'title' => 'Gdańsk', 'correct' => 0, 'question_id' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 74, 'title' => 'Gniezno', 'correct' => 1, 'question_id' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 75, 'title' => '28 maja w 1917r.', 'correct' => 0, 'question_id' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 76, 'title' => '28 lipca w 1914r.', 'correct' => 1, 'question_id' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 77, 'title' => '28 luty w 1933r.', 'correct' => 0, 'question_id' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 78, 'title' => '28 czerwiec 1959r.', 'correct' => 0, 'question_id' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 79, 'title' => 'Bolesław Chrobry', 'correct' => 0, 'question_id' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 80, 'title' => 'Władysław II Jagiełło', 'correct' => 0, 'question_id' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 81, 'title' => 'Stefan Batory', 'correct' => 1, 'question_id' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 82, 'title' => 'Kazimierz III Warneńczyk', 'correct' => 0, 'question_id' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 83, 'title' => 'Połączenia Cerkwi prawosławnej z Kościołem łacińskim w Rzeczypospolitej', 'correct' => 0, 'question_id' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 84, 'title' => 'Była gospodarczo-politycznym związkiem 27 demokratycznych państw europejskich.', 'correct' => 0, 'question_id' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 85, 'title' => 'Porozumienia pomiędzy stanami Korony Królestwa Polskiego i Wielkiego Księstwa Litewskiego zawarte 1 lipca 1569 na sejmie walnym w Lublinie.', 'correct' => 1, 'question_id' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 86, 'title' => 'Związku byłych kolonii brytyjskich z metropolią w ramach Commonwealth realm.', 'correct' => 0, 'question_id' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 87, 'title' => 'Bitwa pod Grunwaldem.', 'correct' => 1, 'question_id' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 88, 'title' => 'Bitwa pod Kircholmem.', 'correct' => 0, 'question_id' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 89, 'title' => 'Bitwa pod Płowcami.', 'correct' => 0, 'question_id' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 90, 'title' => 'Bitwa pod Cedynią.', 'correct' => 0, 'question_id' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 91, 'title' => 'Byli to krzyżacy. ', 'correct' => 0, 'question_id' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 92, 'title' => 'Byli to królowie elekcyjni.', 'correct' => 0, 'question_id' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 93, 'title' => 'Był to ród panujący w Polsce.', 'correct' => 1, 'question_id' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 94, 'title' => 'Był to ród osmański.', 'correct' => 0, 'question_id' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 95, 'title' => '100 lat', 'correct' => 0, 'question_id' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 96, 'title' => '23 lata', 'correct' => 0, 'question_id' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 97, 'title' => '50 lat', 'correct' => 0, 'question_id' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 98, 'title' => '123 lata', 'correct' => 1, 'question_id' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 99, 'title' => 'Imperium Osmańskiemu', 'correct' => 0, 'question_id' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 100, 'title' => 'Imperium Austriackiemu', 'correct' => 0, 'question_id' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 101, 'title' => 'Imperium Pruskiemu', 'correct' => 0, 'question_id' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 102, 'title' => 'Imperium Rosyjskiemu', 'correct' => 1, 'question_id' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 103, 'title' => 'August Poniatowski', 'correct' => 0, 'question_id' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 104, 'title' => 'Władysław Łokietek', 'correct' => 0, 'question_id' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 105, 'title' => 'August II Sas', 'correct' => 1, 'question_id' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 106, 'title' => 'Mieszko I', 'correct' => 0, 'question_id' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 107, 'title' => '14 lutego 2001 roku', 'correct' => 0, 'question_id' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 108, 'title' => '15 marca 2004 roku', 'correct' => 0, 'question_id' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 109, 'title' => '14 lipca 2000 roku', 'correct' => 1, 'question_id' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 110, 'title' => '18 września 2001 roku', 'correct' => 0, 'question_id' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 111, 'title' => 'Na wakacjach', 'correct' => 1, 'question_id' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 112, 'title' => 'W wigilię.', 'correct' => 0, 'question_id' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 113, 'title' => 'Podczas wywiadówki w szkole.', 'correct' => 0, 'question_id' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 114, 'title' => 'Podczas oglądania telewizji.', 'correct' => 0, 'question_id' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 115, 'title' => 'Cztery', 'correct' => 0, 'question_id' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 116, 'title' => 'Jedną', 'correct' => 0, 'question_id' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 117, 'title' => 'Dwie', 'correct' => 0, 'question_id' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 118, 'title' => 'Nie ma on rodzeństwa.', 'correct' => 1, 'question_id' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 119, 'title' => '7 lutego 2021 roku', 'correct' => 0, 'question_id' => 31, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 120, 'title' => '6 września 2021 roku', 'correct' => 1, 'question_id' => 31, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 121, 'title' => '5 czerwca 2020 roku', 'correct' => 0, 'question_id' => 31, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 122, 'title' => '6 kwietnia 2022 roku', 'correct' => 0, 'question_id' => 31, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 123, 'title' => 'Ósmego', 'correct' => 0, 'question_id' => 32, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 124, 'title' => 'Drugiego', 'correct' => 0, 'question_id' => 32, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 125, 'title' => 'Dwudziestego piątego.', 'correct' => 0, 'question_id' => 32, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 126, 'title' => 'Pierwszego', 'correct' => 1, 'question_id' => 32, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1054, 'title' => 'Śliwińska', 'correct' => 1, 'question_id' => 33, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1055, 'title' => 'Kurzak', 'correct' => 0, 'question_id' => 33, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1056, 'title' => 'Pawłowicz', 'correct' => 0, 'question_id' => 33, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1057, 'title' => 'Drozd', 'correct' => 0, 'question_id' => 33, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1058, 'title' => 'Cola zero', 'correct' => 0, 'question_id' => 34, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1059, 'title' => 'Matcha Latte', 'correct' => 1, 'question_id' => 34, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1060, 'title' => 'Mirinda', 'correct' => 0, 'question_id' => 34, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1061, 'title' => 'Sprite', 'correct' => 0, 'question_id' => 34, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1062, 'title' => 'Emilia Plater', 'correct' => 0, 'question_id' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1063, 'title' => 'Stefan Batory', 'correct' => 1, 'question_id' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1064, 'title' => 'Jan Paweł II', 'correct' => 0, 'question_id' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1065, 'title' => 'Benedykt XVI', 'correct' => 0, 'question_id' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1066, 'title' => 'Do Andrzeja Dudy.', 'correct' => 0, 'question_id' => 36, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1067, 'title' => 'Do Mikołaja Kopernika.', 'correct' => 0, 'question_id' => 36, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1068, 'title' => 'Do Taco Hemingwaya.', 'correct' => 0, 'question_id' => 36, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1069, 'title' => 'Do Jacka Granieckiego.', 'correct' => 1, 'question_id' => 36, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1070, 'title' => 'W lipcu 2021 roku.', 'correct' => 0, 'question_id' => 37, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1071, 'title' => 'W lutym 2022 roku.', 'correct' => 0, 'question_id' => 37, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1072, 'title' => 'W sierpniu 2021 roku.', 'correct' => 1, 'question_id' => 37, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1073, 'title' => 'W marcu 2016 roku.', 'correct' => 0, 'question_id' => 37, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1074, 'title' => '419', 'correct' => 0, 'question_id' => 38, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1075, 'title' => '420', 'correct' => 1, 'question_id' => 38, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1076, 'title' => '426', 'correct' => 0, 'question_id' => 38, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1077, 'title' => '1420', 'correct' => 0, 'question_id' => 38, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 127, 'title' => 'Jin', 'correct' => 1, 'question_id' => 39, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 128, 'title' => 'Jim', 'correct' => 0, 'question_id' => 39, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 129, 'title' => 'Jing', 'correct' => 0, 'question_id' => 39, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 130, 'title' => 'Jesse', 'correct' => 1, 'question_id' => 40, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 131, 'title' => 'Robaire', 'correct' => 0, 'question_id' => 40, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 132, 'title' => 'Aaron T', 'correct' => 0, 'question_id' => 40, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 133, 'title' => 'Niedziela', 'correct' => 0, 'question_id' => 41, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 134, 'title' => 'Sobota', 'correct' => 0, 'question_id' => 41, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 135, 'title' => 'Piątek', 'correct' => 1, 'question_id' => 41, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 136, 'title' => 'Sun Yei', 'correct' => 0, 'question_id' => 42, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 137, 'title' => 'Sun Yee', 'correct' => 1, 'question_id' => 42, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 138, 'title' => 'Sun Lee', 'correct' => 0, 'question_id' => 42, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 139, 'title' => 'Devon', 'correct' => 1, 'question_id' => 43, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 140, 'title' => 'David', 'correct' => 0, 'question_id' => 43, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 141, 'title' => 'Dorian', 'correct' => 0, 'question_id' => 43, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 142, 'title' => '"Whats Up"', 'correct' => 0, 'question_id' => 44, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 143, 'title' => 'Nobodu Like U', 'correct' => 1, 'question_id' => 44, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 144, 'title' => 'You and I', 'correct' => 0, 'question_id' => 44, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 145, 'title' => '2', 'correct' => 0, 'question_id' => 45, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 146, 'title' => '3', 'correct' => 1, 'question_id' => 45, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 147, 'title' => '4', 'correct' => 0, 'question_id' => 45, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 148, 'title' => 'Malik', 'correct' => 1, 'question_id' => 46, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 149, 'title' => 'Ali', 'correct' => 0, 'question_id' => 46, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 150, 'title' => 'Mohammad', 'correct' => 0, 'question_id' => 46, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 151, 'title' => '4', 'correct' => 0, 'question_id' => 47, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 152, 'title' => '5', 'correct' => 1, 'question_id' => 47, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 153, 'title' => '6', 'correct' => 0, 'question_id' => 47, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 154, 'title' => 'Miała czerwone oczy', 'correct' => 0, 'question_id' => 48, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 155, 'title' => 'Miała długie pazury', 'correct' => 0, 'question_id' => 48, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 156, 'title' => 'Miała czerwone włosy', 'correct' => 1, 'question_id' => 48, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 157, 'title' => 'Aleksandryna Wiktoria', 'correct' => 1, 'question_id' => 49, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 158, 'title' => 'Izabela I Katolicka', 'correct' => 0, 'question_id' => 49, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 159, 'title' => 'Anna Boleyn', 'correct' => 0, 'question_id' => 49, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 160, 'title' => 'Prawda', 'correct' => 1, 'question_id' => 50, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 161, 'title' => 'Fałsz', 'correct' => 0, 'question_id' => 50, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 162, 'title' => 'Pary nordyckie ukrywały się po ślubie i otrzymywały wino miodowe na 30 dni.', 'correct' => 1, 'question_id' => 51, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 163, 'title' => 'Pan młody musiał zabrać małżonkę na wycieczkę, która trwała przynajmniej jeden, pełny cykl księżyca.', 'correct' => 0, 'question_id' => 51, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 164, 'title' => 'Czterolistna koniczyna w torebce.', 'correct' => 0, 'question_id' => 52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 165, 'title' => 'Pan młody musiał zabrać małżonkę na wycieczkę, która trwała przynajmniej jeden, pełny cykl księżyca.', 'correct' => 1, 'question_id' => 52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 166, 'title' => 'Podkowa na szyi', 'correct' => 0, 'question_id' => 52, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 167, 'title' => 'Czosnek', 'correct' => 1, 'question_id' => 53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 168, 'title' => 'Szałwię', 'correct' => 0, 'question_id' => 53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 169, 'title' => 'Goździki', 'correct' => 0, 'question_id' => 53, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 170, 'title' => 'Szczęscie', 'correct' => 1, 'question_id' => 54, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 171, 'title' => 'Pech', 'correct' => 0, 'question_id' => 54, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 172, 'title' => 'Białe buty', 'correct' => 0, 'question_id' => 55, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 173, 'title' => 'Welon', 'correct' => 1, 'question_id' => 55, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 174, 'title' => 'Niebieską Podwiązke', 'correct' => 0, 'question_id' => 55, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 175, 'title' => 'Francja', 'correct' => 0, 'question_id' => 56, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 176, 'title' => 'Egipt', 'correct' => 1, 'question_id' => 56, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 177, 'title' => 'Anglia', 'correct' => 0, 'question_id' => 56, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 178, 'title' => 'Niedziela', 'correct' => 0, 'question_id' => 57, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 179, 'title' => 'Sobota', 'correct' => 1, 'question_id' => 57, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 180, 'title' => 'Czwartek', 'correct' => 0, 'question_id' => 57, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 181, 'title' => 'Nożyce', 'correct' => 0, 'question_id' => 58, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 182, 'title' => 'Noże', 'correct' => 1, 'question_id' => 58, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 183, 'title' => 'Lustra', 'correct' => 0, 'question_id' => 58, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 184, 'title' => 'Prawda', 'correct' => 1, 'question_id' => 59, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 185, 'title' => 'Fałsz', 'correct' => 0, 'question_id' => 59, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 186, 'title' => 'Piórami', 'correct' => 0, 'question_id' => 60, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 187, 'title' => 'Pszenicą', 'correct' => 0, 'question_id' => 60, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 188, 'title' => 'Grochem', 'correct' => 1, 'question_id' => 60, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 189, 'title' => 'To środek roku i przynosi on szczęście.', 'correct' => 0, 'question_id' => 61, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 190, 'title' => 'Rzymska bogini Juno patronuje nad małżeństwami.', 'correct' => 1, 'question_id' => 61, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 191, 'title' => 'Styczeń', 'correct' => 0, 'question_id' => 62, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 192, 'title' => 'Maj', 'correct' => 1, 'question_id' => 62, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 193, 'title' => 'Październik', 'correct' => 0, 'question_id' => 62, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 194, 'title' => '2021', 'correct' => 1, 'question_id' => 63, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 195, 'title' => '2022', 'correct' => 0, 'question_id' => 63, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 196, 'title' => '2021', 'correct' => 1, 'question_id' => 64, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 197, 'title' => '2022', 'correct' => 0, 'question_id' => 64, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 198, 'title' => '2021', 'correct' => 0, 'question_id' => 65, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 199, 'title' => '2022', 'correct' => 1, 'question_id' => 65, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 200, 'title' => '2021', 'correct' => 1, 'question_id' => 66, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 201, 'title' => '2022', 'correct' => 0, 'question_id' => 66, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 202, 'title' => '2021', 'correct' => 0, 'question_id' => 67, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 203, 'title' => '2022', 'correct' => 1, 'question_id' => 67, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 204, 'title' => '2021', 'correct' => 1, 'question_id' => 68, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 205, 'title' => '2022', 'correct' => 0, 'question_id' => 68, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 206, 'title' => '2021', 'correct' => 0, 'question_id' => 69, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 207, 'title' => '2022', 'correct' => 1, 'question_id' => 69, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 208, 'title' => '2021', 'correct' => 1, 'question_id' => 70, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 209, 'title' => '2022', 'correct' => 0, 'question_id' => 70, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 210, 'title' => 'Poniżej 350 km/h', 'correct' => 0, 'question_id' => 71, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 211, 'title' => '350 - 375 km/h', 'correct' => 1, 'question_id' => 71, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 212, 'title' => '380 - 400 km/h', 'correct' => 0, 'question_id' => 71, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 213, 'title' => 'Ponad 400 kmh', 'correct' => 0, 'question_id' => 71, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 214, 'title' => 'Ferrari f12 berlinetta', 'correct' => 0, 'question_id' => 72, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 215, 'title' => 'Mclaren F1', 'correct' => 1, 'question_id' => 72, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 216, 'title' => '2.5 sekundy', 'correct' => 0, 'question_id' => 73, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 217, 'title' => '3 sekundy', 'correct' => 0, 'question_id' => 73, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 218, 'title' => '2.8 sekundy', 'correct' => 1, 'question_id' => 73, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 219, 'title' => '3.5 sekundy', 'correct' => 0, 'question_id' => 73, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 220, 'title' => '2000', 'correct' => 0, 'question_id' => 74, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 221, 'title' => '2010', 'correct' => 0, 'question_id' => 74, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 222, 'title' => '2012', 'correct' => 0, 'question_id' => 74, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 223, 'title' => '2005', 'correct' => 1, 'question_id' => 74, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 224, 'title' => 'Bugatti Chiron', 'correct' => 1, 'question_id' => 75, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 225, 'title' => 'Lamborghini Egoista', 'correct' => 0, 'question_id' => 75, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 226, 'title' => 'Ford Mustang 5.0', 'correct' => 0, 'question_id' => 76, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 227, 'title' => 'Chevrolet Camaro ZL1', 'correct' => 1, 'question_id' => 76, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 228, 'title' => 'Dodge Challenger', 'correct' => 0, 'question_id' => 76, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 229, 'title' => 'Bugatti Chiron', 'correct' => 0, 'question_id' => 77, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 230, 'title' => 'Bugatti Divo', 'correct' => 0, 'question_id' => 77, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 231, 'title' => 'Bugatti La Voiture Noire', 'correct' => 1, 'question_id' => 77, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 232, 'title' => 'Bugatti', 'correct' => 1, 'question_id' => 78, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 233, 'title' => 'Koenigseeg', 'correct' => 0, 'question_id' => 78, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 234, 'title' => 'Ferrari', 'correct' => 1, 'question_id' => 79, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 235, 'title' => 'Lamborghini', 'correct' => 0, 'question_id' => 79, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 236, 'title' => 'Porsche', 'correct' => 0, 'question_id' => 79, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 237, 'title' => 'Ferrari 360 challenge stradale', 'correct' => 0, 'question_id' => 80, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 238, 'title' => 'Ferrari Enzo', 'correct' => 1, 'question_id' => 80, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 239, 'title' => 'Ferrari LaFerrari', 'correct' => 0, 'question_id' => 80, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 240, 'title' => 'Alexandre Darracq', 'correct' => 0, 'question_id' => 81, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 241, 'title' => 'Nicola Romeo', 'correct' => 0, 'question_id' => 81, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 242, 'title' => 'Romano Cattaneo', 'correct' => 1, 'question_id' => 81, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 243, 'title' => 'Oldsmobile Curved Dash', 'correct' => 1, 'question_id' => 82, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 244, 'title' => 'Ford T.', 'correct' => 0, 'question_id' => 82, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 245, 'title' => 'Steiger 11/55 PS', 'correct' => 0, 'question_id' => 82, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 246, 'title' => '1980', 'correct' => 0, 'question_id' => 83, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 247, 'title' => '1934', 'correct' => 0, 'question_id' => 83, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 248, 'title' => '1893', 'correct' => 1, 'question_id' => 83, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 249, 'title' => '1952', 'correct' => 0, 'question_id' => 83, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 250, 'title' => 'Do kształtu szybowca.', 'correct' => 0, 'question_id' => 84, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 251, 'title' => 'Do pierwszego modelu roweru, który stworzyli.', 'correct' => 1, 'question_id' => 84, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 252, 'title' => 'Do szybkości ich samochodów.', 'correct' => 0, 'question_id' => 84, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 253, 'title' => 'USA', 'correct' => 0, 'question_id' => 85, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 254, 'title' => 'Niemcy', 'correct' => 0, 'question_id' => 85, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 255, 'title' => 'Wielka Brytania', 'correct' => 1, 'question_id' => 85, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 256, 'title' => 'Francja', 'correct' => 0, 'question_id' => 85, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 257, 'title' => 'Nils Bohlin', 'correct' => 0, 'question_id' => 86, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 258, 'title' => 'Carl Magee', 'correct' => 1, 'question_id' => 86, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 259, 'title' => 'Siegfried Marcus', 'correct' => 0, 'question_id' => 86, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 260, 'title' => 'Bayerische Motoren Werke', 'correct' => 1, 'question_id' => 87, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 261, 'title' => 'Bardzo Mądry Wybór', 'correct' => 0, 'question_id' => 87, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 262, 'title' => 'Bayerisch Motor Werke', 'correct' => 0, 'question_id' => 87, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 263, 'title' => 'Będziesz Miał Wypadek', 'correct' => 0, 'question_id' => 87, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 264, 'title' => 'Kiedy Emil Skoda odkupił od hrabiego Waldsteina zakład przemysłu metalowego i zbrojeniowego.', 'correct' => 0, 'question_id' => 88, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 265, 'title' => 'Po śmierci Emila Skody.', 'correct' => 1, 'question_id' => 88, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 266, 'title' => 'Po narodzinach córki Emila Skody.', 'correct' => 0, 'question_id' => 88, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 267, 'title' => 'Zawodnikiem cavaliady', 'correct' => 0, 'question_id' => 89, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 268, 'title' => 'Kierowcą rajdowym', 'correct' => 0, 'question_id' => 89, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 269, 'title' => 'Śpiewakiem operowym', 'correct' => 1, 'question_id' => 89, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 270, 'title' => 'Od imienia córki Emila Jellinka.', 'correct' => 1, 'question_id' => 90, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 271, 'title' => 'Od imienia żony Emila Jellinka.', 'correct' => 0, 'question_id' => 90, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 272, 'title' => 'Od Matki Boskiej, która ochroniła fimę przed upadkiem.', 'correct' => 0, 'question_id' => 90, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 273, 'title' => 'Symbolizują wiatrak.', 'correct' => 0, 'question_id' => 91, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 274, 'title' => 'Wskazują trzy obszary produkcji (samochody, samoloty i łodzie).', 'correct' => 1, 'question_id' => 91, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 275, 'title' => 'Symbolizują Trójcę Świętą.', 'correct' => 0, 'question_id' => 91, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 276, 'title' => 'produkcją młynków do kawy.', 'correct' => 1, 'question_id' => 92, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 277, 'title' => 'Produkcją czołgów.', 'correct' => 0, 'question_id' => 92, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 278, 'title' => 'Produkcją rowerów.', 'correct' => 0, 'question_id' => 92, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 279, 'title' => 'Produkcją samolotów.', 'correct' => 0, 'question_id' => 92, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 280, 'title' => 'Skoda', 'correct' => 0, 'question_id' => 93, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 281, 'title' => 'BMW', 'correct' => 0, 'question_id' => 93, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 282, 'title' => 'Volvo', 'correct' => 1, 'question_id' => 93, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 283, 'title' => 'Selfie', 'correct' => 1, 'question_id' => 94, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 284, 'title' => 'Mem', 'correct' => 0, 'question_id' => 94, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 285, 'title' => 'Haul', 'correct' => 0, 'question_id' => 94, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 286, 'title' => '"Zajrzyj na mój profil."', 'correct' => 0, 'question_id' => 95, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 287, 'title' => '"Moim zdaniem."', 'correct' => 1, 'question_id' => 95, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 288, 'title' => '"Bardzo zabawne."', 'correct' => 0, 'question_id' => 95, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 289, 'title' => 'POV', 'correct' => 1, 'question_id' => 96, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 290, 'title' => 'LMAO', 'correct' => 0, 'question_id' => 96, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 291, 'title' => 'L4L', 'correct' => 0, 'question_id' => 96, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 292, 'title' => 'Udostępniania naszej relacji.', 'correct' => 0, 'question_id' => 97, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 293, 'title' => 'Śledzenia naszego konta.', 'correct' => 0, 'question_id' => 97, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 294, 'title' => 'Zadawania nam pytań na dowolny temat.', 'correct' => 1, 'question_id' => 97, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 295, 'title' => 'Polubienie (zdjęcia, posta) za polubienie.', 'correct' => 1, 'question_id' => 98, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 296, 'title' => 'Raz się żyje.', 'correct' => 0, 'question_id' => 98, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 297, 'title' => 'Dodaj mnie do znajomych.', 'correct' => 0, 'question_id' => 98, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 298, 'title' => 'Na Snapchacie.', 'correct' => 1, 'question_id' => 99, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 299, 'title' => 'Na Twitterze.', 'correct' => 0, 'question_id' => 99, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 300, 'title' => 'Na Instagramie.', 'correct' => 0, 'question_id' => 99, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 301, 'title' => 'IRL', 'correct' => 0, 'question_id' => 100, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 302, 'title' => 'EOT', 'correct' => 1, 'question_id' => 100, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 303, 'title' => 'Zablokowanie kogoś.', 'correct' => 0, 'question_id' => 101, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 304, 'title' => 'Zdjęcie znikające po jednorazowym wyświetleniu.', 'correct' => 0, 'question_id' => 101, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 305, 'title' => 'Wiadomość prywatną.', 'correct' => 1, 'question_id' => 101, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 306, 'title' => 'Chcemy wysłać komuś prywatną wiadomość.', 'correct' => 0, 'question_id' => 102, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 307, 'title' => 'Zgadzamy się z czyimś zdaniem.', 'correct' => 1, 'question_id' => 102, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 308, 'title' => 'Ktoś zbyt odbiega od tematu rozmowy.', 'correct' => 0, 'question_id' => 102, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 309, 'title' => 'Udostępnienie czyjegoś wpisu.', 'correct' => 1, 'question_id' => 103, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 310, 'title' => 'Zgłoszenie obraźliwej treści lub spam.', 'correct' => 0, 'question_id' => 103, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 311, 'title' => 'Wyróżnione zdjęcia lub posty.', 'correct' => 0, 'question_id' => 103, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 312, 'title' => 'W 1965 roku', 'correct' => 0, 'question_id' => 104, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 313, 'title' => 'W 1955 roku', 'correct' => 0, 'question_id' => 104, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 314, 'title' => 'W 1945 roku', 'correct' => 1, 'question_id' => 104, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 315, 'title' => 'W 1935 roku', 'correct' => 0, 'question_id' => 104, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 316, 'title' => 'World Wide Web', 'correct' => 1, 'question_id' => 105, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 317, 'title' => 'World Wild Web', 'correct' => 0, 'question_id' => 105, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 318, 'title' => 'Word Wide Web', 'correct' => 0, 'question_id' => 105, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 319, 'title' => 'World Web Wide', 'correct' => 0, 'question_id' => 105, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 320, 'title' => 'W 1995 roku', 'correct' => 0, 'question_id' => 106, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 321, 'title' => 'W 1985 roku', 'correct' => 0, 'question_id' => 106, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 322, 'title' => 'W 1980 roku', 'correct' => 0, 'question_id' => 106, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 323, 'title' => 'W 1990 roku', 'correct' => 1, 'question_id' => 106, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 324, 'title' => 'W 1980 roku', 'correct' => 0, 'question_id' => 107, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 325, 'title' => 'W 1971 roku', 'correct' => 1, 'question_id' => 107, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 326, 'title' => 'W 1991 roku', 'correct' => 0, 'question_id' => 107, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 327, 'title' => 'W 1995 roku', 'correct' => 0, 'question_id' => 107, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 328, 'title' => 'jawed_karim', 'correct' => 0, 'question_id' => 108, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 329, 'title' => 'jawed', 'correct' => 1, 'question_id' => 108, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 330, 'title' => 'Karimj', 'correct' => 0, 'question_id' => 108, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 331, 'title' => 'JKrim', 'correct' => 0, 'question_id' => 108, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 332, 'title' => 'SEA-ME-WE 4', 'correct' => 0, 'question_id' => 109, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 333, 'title' => 'SEA-ME-WE 3', 'correct' => 1, 'question_id' => 109, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 334, 'title' => 'Yellow/ AC-2', 'correct' => 0, 'question_id' => 109, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 335, 'title' => 'AC-1', 'correct' => 0, 'question_id' => 109, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 336, 'title' => 'W 1967 roku', 'correct' => 0, 'question_id' => 110, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 337, 'title' => 'W 1985 roku', 'correct' => 0, 'question_id' => 110, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 338, 'title' => 'W 1988 roku', 'correct' => 1, 'question_id' => 110, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 339, 'title' => 'W 1990 roku', 'correct' => 0, 'question_id' => 110, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 340, 'title' => 'W 1964 roku', 'correct' => 1, 'question_id' => 111, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 341, 'title' => 'W 1970 roku', 'correct' => 0, 'question_id' => 111, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 342, 'title' => 'W 1980 roku', 'correct' => 0, 'question_id' => 111, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 343, 'title' => 'W 1988 roku', 'correct' => 0, 'question_id' => 111, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 344, 'title' => 'W kwietniu 2016 roku', 'correct' => 0, 'question_id' => 112, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 345, 'title' => 'We wrześniu 2017 roku', 'correct' => 0, 'question_id' => 112, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 346, 'title' => 'W grudniu 2015 roku', 'correct' => 0, 'question_id' => 112, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 347, 'title' => 'W czerwcu 2018 roku', 'correct' => 1, 'question_id' => 112, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 348, 'title' => 'Od 1975 roku', 'correct' => 0, 'question_id' => 113, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 349, 'title' => 'Od 1980 roku', 'correct' => 1, 'question_id' => 113, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 350, 'title' => 'Od 1990 roku', 'correct' => 0, 'question_id' => 113, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 351, 'title' => 'Od 2000 roku', 'correct' => 0, 'question_id' => 113, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 352, 'title' => 'Pośrodku-sieci', 'correct' => 0, 'question_id' => 114, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 353, 'title' => 'W sieci', 'correct' => 0, 'question_id' => 114, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 354, 'title' => 'Między-sieciami', 'correct' => 1, 'question_id' => 114, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 355, 'title' => 'Przez-sieci', 'correct' => 0, 'question_id' => 114, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 356, 'title' => 'Odtwarzanie bez reklam', 'correct' => 1, 'question_id' => 116, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 357, 'title' => 'Odtwarzanie dowolnych utworów', 'correct' => 2, 'question_id' => 117, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 358, 'title' => 'Pomijanie bez limitu', 'correct' => 2, 'question_id' => 117, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 359, 'title' => 'Możliwość tworzenia z kilku piosenek jednej', 'correct' => 1, 'question_id' => 115, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 360, 'title' => 'Uciekam jak najszybciej!', 'correct' => 0, 'question_id' => 116, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 361, 'title' => 'Zatrzymuję samochód na poboczu, by nie stwarzać zagrożenia. Włączam światła awaryjne i ustawiam trójkąt ostrzegawczy w odpowiedniej odległości od miejsca zdarzenia.', 'correct' => 1, 'question_id' => 116, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 362, 'title' => 'Zatrzymuję samochód na środku drogi, bo w końcu nikogo innego tutaj nie ma. Podbiegam do rannego i zaczynam panikować.', 'correct' => 0, 'question_id' => 116, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 363, 'title' => 'Podchodzę do niego i od tyłu ciągam go za obie ręce na trawę, przecież ktoś może go potrącić.', 'correct' => 0, 'question_id' => 117, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 364, 'title' => 'Kładę mu pod głowę coś miękkiego, np. bluzę czy kurtkę.', 'correct' => 0, 'question_id' => 117, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 365, 'title' => 'Oceniam stan poszkodowanego, dopiero później dzwonię po pogotowie.', 'correct' => 1, 'question_id' => 117, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 367, 'title' => 'Staram się zachować zimną krew. Podaję najpierw dokładne miejsce wypadku oraz liczbę i stan ofiar wypadku, nie rozłączam się.', 'correct' => 1, 'question_id' => 118, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 368, 'title' => 'Podaję imię i nazwisko, a później miejsce wypadku i opisuję co się stało.', 'correct' => 0, 'question_id' => 118, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 369, 'title' => 'Jąkam się i nie umiem zebrać słów w jedną całość.', 'correct' => 0, 'question_id' => 118, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 370, 'title' => 'Czekam na przyjazd służb i nie ruszam poszkodowanego.', 'correct' => 0, 'question_id' => 119, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 371, 'title' => 'Rozpoczynam resuscytację krążeniowo-oddechową.', 'correct' => 1, 'question_id' => 119, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 372, 'title' => 'Potrząsam rannym, sprawdzam czy żyje i oddycha.', 'correct' => 0, 'question_id' => 119, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 373, 'title' => 'Udrożnić drogi oddechowe.', 'correct' => 1, 'question_id' => 120, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 374, 'title' => '30 uciśnięć.', 'correct' => 0, 'question_id' => 120, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 375, 'title' => '2 wdechy zastępcze.', 'correct' => 0, 'question_id' => 120, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 376, 'title' => 'Jak najszybciej próbuję wyciągnąć niepożądany przedmiot.', 'correct' => 0, 'question_id' => 121, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 377, 'title' => 'Absolutnie nie wyciągam fragmentu szkła, bo mogę tylko pogorszyć sprawę.', 'correct' => 0, 'question_id' => 121, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 378, 'title' => 'Umieszczam opatrunek w taki sposób, by nie dopuścić do przemieszczenia się przedmiotu w ranie.', 'correct' => 1, 'question_id' => 121, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 379, 'title' => 'Unieruchamiam miejsce złamania i dwa sąsiadujące stawy.', 'correct' => 1, 'question_id' => 122, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 380, 'title' => 'Nastawiam kość poszkodowanemu.', 'correct' => 0, 'question_id' => 122, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 381, 'title' => 'Zaprzestaję jakichkolwiek działań, zmęczyłem się.', 'correct' => 0, 'question_id' => 122, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 382, 'title' => 'Odpoczywam po ciężkiej pracy.', 'correct' => 0, 'question_id' => 123, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 383, 'title' => 'Kontynuuję resuscytację krążeniowo-oddechową.', 'correct' => 1, 'question_id' => 123, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 384, 'title' => 'Staram się obudzić poszkodowanego.', 'correct' => 0, 'question_id' => 123, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 385, 'title' => 'Karabin', 'correct' => 0, 'question_id' => 124, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 386, 'title' => 'Laser', 'correct' => 0, 'question_id' => 124, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 387, 'title' => 'Dynamit', 'correct' => 1, 'question_id' => 124, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 389, 'title' => 'Bombe atomową', 'correct' => 0, 'question_id' => 124, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 390, 'title' => 'Zegar słoneczny', 'correct' => 1, 'question_id' => 125, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 391, 'title' => 'Zegar piaskowy', 'correct' => 0, 'question_id' => 125, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 392, 'title' => 'Zegar wodny', 'correct' => 0, 'question_id' => 125, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 393, 'title' => 'Zegar gwiazdowy', 'correct' => 0, 'question_id' => 125, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 394, 'title' => 'Projekt Manhattan', 'correct' => 1, 'question_id' => 126, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 395, 'title' => 'Trinity', 'correct' => 0, 'question_id' => 126, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 396, 'title' => 'Nogasaki', 'correct' => 0, 'question_id' => 126, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 397, 'title' => 'Los Alamos', 'correct' => 0, 'question_id' => 126, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 398, 'title' => 'Papier z celulozy', 'correct' => 0, 'question_id' => 127, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 399, 'title' => 'Maszyna parowa', 'correct' => 0, 'question_id' => 127, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 400, 'title' => 'Ruchoma czcionka drukarska', 'correct' => 1, 'question_id' => 127, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 401, 'title' => 'Maszyne liczącą - pierwowzór kalkulatora', 'correct' => 0, 'question_id' => 127, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 402, 'title' => '70', 'correct' => 0, 'question_id' => 128, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 403, 'title' => '60', 'correct' => 0, 'question_id' => 128, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 404, 'title' => '50', 'correct' => 1, 'question_id' => 128, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 405, 'title' => '80', 'correct' => 0, 'question_id' => 128, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 406, 'title' => 'Projektor', 'correct' => 0, 'question_id' => 129, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 407, 'title' => 'Kuchenka mikrofalowa', 'correct' => 0, 'question_id' => 129, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 408, 'title' => 'Lampa naftowa', 'correct' => 1, 'question_id' => 129, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 409, 'title' => 'Kuchenka gazowa', 'correct' => 0, 'question_id' => 129, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 410, 'title' => '10,5 tys. lat', 'correct' => 0, 'question_id' => 130, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 411, 'title' => '5,5 tys. lat', 'correct' => 0, 'question_id' => 130, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 412, 'title' => '3,5 tys. lat', 'correct' => 1, 'question_id' => 130, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 413, 'title' => '100 tys. lat', 'correct' => 0, 'question_id' => 130, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 414, 'title' => 'W 300 n.e.', 'correct' => 0, 'question_id' => 131, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 415, 'title' => 'W 30 p.n.e', 'correct' => 0, 'question_id' => 131, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 416, 'title' => 'W 3000 p.n.e.', 'correct' => 1, 'question_id' => 131, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 417, 'title' => 'W 30 n.e.', 'correct' => 0, 'question_id' => 131, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 418, 'title' => 'ZSRR', 'correct' => 1, 'question_id' => 132, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 419, 'title' => 'RFN', 'correct' => 0, 'question_id' => 132, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 420, 'title' => 'USA', 'correct' => 0, 'question_id' => 132, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 421, 'title' => 'NRD', 'correct' => 0, 'question_id' => 132, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 422, 'title' => '12 sekund', 'correct' => 1, 'question_id' => 133, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 423, 'title' => '12 minut', 'correct' => 0, 'question_id' => 133, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 424, 'title' => '1 minutę 20 sekund', 'correct' => 0, 'question_id' => 133, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 425, 'title' => '1 godzinę 2 minuty', 'correct' => 0, 'question_id' => 133, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 426, 'title' => 'W Starożytnym Egipcie', 'correct' => 0, 'question_id' => 134, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 427, 'title' => 'W Chinach', 'correct' => 0, 'question_id' => 134, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 428, 'title' => 'Na Półwyspie Bałkańskim', 'correct' => 0, 'question_id' => 134, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 429, 'title' => 'W Mezopotamii', 'correct' => 1, 'question_id' => 134, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 430, 'title' => '"Panie Watson, przyszło mi w udziale wypowiedzieć te słowa"', 'correct' => 0, 'question_id' => 135, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 431, 'title' => '"Panie Watson, próba mikrofonu, raz, dwa, trzy"', 'correct' => 0, 'question_id' => 135, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 432, 'title' => '"Panie Watson, proszę tu przyjść, potrzebuję pana"', 'correct' => 1, 'question_id' => 135, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 433, 'title' => '"Panie Watson, oto wiekopomne dzieło"', 'correct' => 0, 'question_id' => 135, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 434, 'title' => 'Był Brytyjczykiem', 'correct' => 1, 'question_id' => 136, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 435, 'title' => 'Był obywatelem USA', 'correct' => 0, 'question_id' => 136, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 436, 'title' => 'Był Niemcem', 'correct' => 0, 'question_id' => 136, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 437, 'title' => 'Był Polakiem', 'correct' => 0, 'question_id' => 136, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 438, 'title' => 'W XIX', 'correct' => 0, 'question_id' => 137, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 439, 'title' => 'W XV', 'correct' => 0, 'question_id' => 137, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 440, 'title' => 'W XIII', 'correct' => 1, 'question_id' => 137, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 441, 'title' => 'W XVIII', 'correct' => 0, 'question_id' => 137, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 442, 'title' => 'Tak', 'correct' => 0, 'question_id' => 138, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 443, 'title' => 'Nie', 'correct' => 1, 'question_id' => 138, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 444, 'title' => 'W 1820', 'correct' => 0, 'question_id' => 139, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 445, 'title' => 'W 1763', 'correct' => 1, 'question_id' => 139, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 446, 'title' => 'W 1863', 'correct' => 0, 'question_id' => 139, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 447, 'title' => 'W 1920', 'correct' => 0, 'question_id' => 139, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 448, 'title' => 'Braciom Grimm', 'correct' => 0, 'question_id' => 140, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 449, 'title' => 'Braciom Wright', 'correct' => 0, 'question_id' => 140, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 450, 'title' => 'Małżeństwu Rosenbergów', 'correct' => 0, 'question_id' => 140, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 451, 'title' => 'Braciom Lumière', 'correct' => 1, 'question_id' => 140, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 452, 'title' => 'Dla celów medycznych', 'correct' => 0, 'question_id' => 141, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 453, 'title' => 'Dla potrzeb Biblioteki Kongresu USA', 'correct' => 0, 'question_id' => 141, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 454, 'title' => 'Dla potrzeb firmy telekomunikacyjnej', 'correct' => 0, 'question_id' => 141, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 455, 'title' => 'Dla celów militarnych', 'correct' => 1, 'question_id' => 141, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 456, 'title' => 'Joseph Wilson Swan', 'correct' => 1, 'question_id' => 142, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 457, 'title' => 'Thomas Alva Edison', 'correct' => 0, 'question_id' => 142, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 458, 'title' => 'Turkom', 'correct' => 0, 'question_id' => 143, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 459, 'title' => 'Persom', 'correct' => 0, 'question_id' => 143, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 460, 'title' => 'Chińczykom', 'correct' => 1, 'question_id' => 143, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 461, 'title' => 'Rzymianom', 'correct' => 0, 'question_id' => 143, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 462, 'title' => 'Pocztowa trąbka', 'correct' => 1, 'question_id' => 144, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 463, 'title' => 'Pocztowy puzon', 'correct' => 0, 'question_id' => 144, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 464, 'title' => 'Pocztowa tuba', 'correct' => 0, 'question_id' => 144, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 465, 'title' => 'Pocztowy róg', 'correct' => 0, 'question_id' => 144, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 466, 'title' => 'trzy razy', 'correct' => 0, 'question_id' => 145, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 467, 'title' => 'dwa razy', 'correct' => 1, 'question_id' => 145, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 468, 'title' => 'cztery razy', 'correct' => 0, 'question_id' => 145, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 469, 'title' => 'Skaldowie', 'correct' => 1, 'question_id' => 146, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 470, 'title' => 'Trubadurzy', 'correct' => 0, 'question_id' => 146, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 471, 'title' => 'Czerwone Gitary', 'correct' => 0, 'question_id' => 146, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 472, 'title' => 'Czerwono-Czarni', 'correct' => 0, 'question_id' => 146, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 473, 'title' => 'Górnego Śląska', 'correct' => 0, 'question_id' => 147, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 474, 'title' => 'Dolnego Śląska', 'correct' => 0, 'question_id' => 147, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 475, 'title' => 'Małopolski', 'correct' => 1, 'question_id' => 147, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 476, 'title' => 'Janusz Rewiński', 'correct' => 0, 'question_id' => 148, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 477, 'title' => 'Zenon Laskowik', 'correct' => 0, 'question_id' => 148, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 478, 'title' => 'Bohdan Smoleń', 'correct' => 1, 'question_id' => 148, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 479, 'title' => 'Ryszard Kotys', 'correct' => 0, 'question_id' => 148, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 480, 'title' => 'Kraków', 'correct' => 0, 'question_id' => 149, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 481, 'title' => 'Wrocław', 'correct' => 1, 'question_id' => 149, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 482, 'title' => 'Poznań', 'correct' => 0, 'question_id' => 149, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 483, 'title' => 'Łódź', 'correct' => 0, 'question_id' => 149, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 484, 'title' => 'Z Chile', 'correct' => 1, 'question_id' => 150, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 485, 'title' => 'Z Ekwadoru', 'correct' => 0, 'question_id' => 150, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 486, 'title' => 'Z Kolumbii', 'correct' => 0, 'question_id' => 150, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 487, 'title' => 'Z Paragwaju', 'correct' => 0, 'question_id' => 150, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 488, 'title' => 'Vincent van Gogh', 'correct' => 1, 'question_id' => 151, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 489, 'title' => 'Edgar Degas', 'correct' => 0, 'question_id' => 151, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 490, 'title' => 'Paul Gauguin', 'correct' => 0, 'question_id' => 151, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 491, 'title' => 'Edvard Munch', 'correct' => 0, 'question_id' => 151, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 492, 'title' => 'Listonosz Jeff', 'correct' => 0, 'question_id' => 152, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 493, 'title' => 'Listonosz Alf', 'correct' => 0, 'question_id' => 152, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 494, 'title' => 'Listonosz Pat', 'correct' => 1, 'question_id' => 152, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 495, 'title' => 'Listonosz Jess', 'correct' => 0, 'question_id' => 152, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 496, 'title' => 'Bruce Willis', 'correct' => 0, 'question_id' => 153, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 497, 'title' => 'Kevin Costner', 'correct' => 1, 'question_id' => 153, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 498, 'title' => 'Mel Gibson', 'correct' => 0, 'question_id' => 153, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 499, 'title' => 'Sean Connery', 'correct' => 0, 'question_id' => 153, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 500, 'title' => 'Jarosława Iwaszkiewicza', 'correct' => 1, 'question_id' => 154, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 501, 'title' => 'Antoniego Słonimskiego', 'correct' => 0, 'question_id' => 154, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 502, 'title' => 'Stanisława Mrożka', 'correct' => 0, 'question_id' => 154, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 503, 'title' => 'Mirona Białoszewskiego', 'correct' => 0, 'question_id' => 154, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 504, 'title' => 'Realistycznego', 'correct' => 0, 'question_id' => 155, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 505, 'title' => 'Impresjonistycznego', 'correct' => 0, 'question_id' => 155, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 506, 'title' => 'Kubistycznego', 'correct' => 1, 'question_id' => 155, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 507, 'title' => 'Pop-artu', 'correct' => 0, 'question_id' => 155, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 508, 'title' => 'Warszawy', 'correct' => 0, 'question_id' => 156, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 509, 'title' => 'Gdańska', 'correct' => 1, 'question_id' => 156, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 601, 'title' => 'Krakowa', 'correct' => 0, 'question_id' => 156, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 602, 'title' => 'Wrocławia', 'correct' => 0, 'question_id' => 156, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 603, 'title' => 'Kornel Makuszyński', 'correct' => 1, 'question_id' => 157, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 604, 'title' => 'Jan Brzechwa', 'correct' => 0, 'question_id' => 157, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 605, 'title' => 'Maria Konopnicka', 'correct' => 0, 'question_id' => 157, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 606, 'title' => 'Julian Tuwim', 'correct' => 0, 'question_id' => 157, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 607, 'title' => 'Niebieskiego', 'correct' => 1, 'question_id' => 158, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 608, 'title' => 'Czerwonego', 'correct' => 0, 'question_id' => 158, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 609, 'title' => 'Zielonego', 'correct' => 0, 'question_id' => 158, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 610, 'title' => 'Żółtego', 'correct' => 0, 'question_id' => 158, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 611, 'title' => 'Stąd', 'correct' => 0, 'question_id' => 159, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 612, 'title' => 'Znikąd', 'correct' => 0, 'question_id' => 159, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 613, 'title' => 'Ktoś', 'correct' => 0, 'question_id' => 159, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 614, 'title' => 'Nikt', 'correct' => 1, 'question_id' => 159, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 615, 'title' => 'O’Hara', 'correct' => 0, 'question_id' => 160, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 616, 'title' => 'Dashwood', 'correct' => 0, 'question_id' => 160, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 617, 'title' => 'Bennet', 'correct' => 1, 'question_id' => 160, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 618, 'title' => 'Eyre', 'correct' => 0, 'question_id' => 160, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 619, 'title' => 'Diego Velázquez', 'correct' => 1, 'question_id' => 161, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 620, 'title' => 'Peter Paul Rubens', 'correct' => 0, 'question_id' => 161, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 621, 'title' => 'Rembrandt', 'correct' => 0, 'question_id' => 161, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 622, 'title' => 'Eugène Delacroix', 'correct' => 0, 'question_id' => 161, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 623, 'title' => 'Natalka', 'correct' => 0, 'question_id' => 162, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 624, 'title' => 'Irenka', 'correct' => 1, 'question_id' => 162, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 625, 'title' => 'Malwinka', 'correct' => 0, 'question_id' => 162, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 626, 'title' => 'Anielka', 'correct' => 0, 'question_id' => 162, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 627, 'title' => 'Stendhal', 'correct' => 0, 'question_id' => 163, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 628, 'title' => 'Marcel Proust', 'correct' => 0, 'question_id' => 163, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 629, 'title' => 'Émile Zola', 'correct' => 0, 'question_id' => 163, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 630, 'title' => 'Honoré de Balzac', 'correct' => 1, 'question_id' => 163, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 631, 'title' => 'Tim Berners-Lee', 'correct' => 0, 'question_id' => 164, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 632, 'title' => 'Robert Cailliau', 'correct' => 1, 'question_id' => 164, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 633, 'title' => 'Tim Cook', 'correct' => 0, 'question_id' => 164, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 634, 'title' => 'Steve Jobs', 'correct' => 0, 'question_id' => 164, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 635, 'title' => 'HTML 5', 'correct' => 1, 'question_id' => 165, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 636, 'title' => 'HTML 4', 'correct' => 0, 'question_id' => 165, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 637, 'title' => 'HTML 7', 'correct' => 0, 'question_id' => 165, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 638, 'title' => 'HTML 1', 'correct' => 0, 'question_id' => 165, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 639, 'title' => 'Kolor czcionki', 'correct' => 0, 'question_id' => 166, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 640, 'title' => 'Wstawianie obrazka', 'correct' => 0, 'question_id' => 166, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 641, 'title' => 'Nowy akapit', 'correct' => 0, 'question_id' => 166, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 642, 'title' => 'Nagłówek', 'correct' => 1, 'question_id' => 166, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 643, 'title' => 'Programowanie systemów', 'correct' => 0, 'question_id' => 167, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 644, 'title' => 'Programowanie programów', 'correct' => 0, 'question_id' => 167, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 645, 'title' => 'Do pisania stron internetowych', 'correct' => 1, 'question_id' => 167, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 646, 'title' => 'Programowanie na telefony komórkowe', 'correct' => 0, 'question_id' => 167, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 647, 'title' => 'CSS3', 'correct' => 0, 'question_id' => 168, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 648, 'title' => 'CSS', 'correct' => 0, 'question_id' => 168, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 649, 'title' => 'CSS2', 'correct' => 0, 'question_id' => 168, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 650, 'title' => 'CSS4', 'correct' => 1, 'question_id' => 168, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 651, 'title' => 'Programowanie aplikacji webowych', 'correct' => 0, 'question_id' => 169, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 652, 'title' => 'Do opisywania elementów na stronie', 'correct' => 1, 'question_id' => 169, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 653, 'title' => 'Programowanie gier', 'correct' => 0, 'question_id' => 169, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 654, 'title' => 'background-color:', 'correct' => 1, 'question_id' => 170, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 655, 'title' => 'bgcolor', 'correct' => 0, 'question_id' => 170, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 656, 'title' => 'bground-color', 'correct' => 0, 'question_id' => 170, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 657, 'title' => 'background-image', 'correct' => 0, 'question_id' => 170, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 658, 'title' => 'Tak', 'correct' => 1, 'question_id' => 171, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 659, 'title' => 'Nie', 'correct' => 0, 'question_id' => 171, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 660, 'title' => 'Apple', 'correct' => 0, 'question_id' => 172, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 661, 'title' => 'Microsoft', 'correct' => 0, 'question_id' => 172, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 662, 'title' => 'W3C', 'correct' => 1, 'question_id' => 172, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 663, 'title' => 'Google', 'correct' => 0, 'question_id' => 172, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 664, 'title' => 'Tak', 'correct' => 0, 'question_id' => 173, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 665, 'title' => 'Nie', 'correct' => 1, 'question_id' => 173, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 666, 'title' => 'Silver 1', 'correct' => 1, 'question_id' => 174, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 667, 'title' => 'Global Elite', 'correct' => 0, 'question_id' => 174, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 668, 'title' => 'Gold Nova 3', 'correct' => 0, 'question_id' => 174, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 669, 'title' => 'Master Guardian', 'correct' => 0, 'question_id' => 174, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 670, 'title' => 'Italy', 'correct' => 0, 'question_id' => 175, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 671, 'title' => 'Dust 1', 'correct' => 0, 'question_id' => 175, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 672, 'title' => 'Bank', 'correct' => 1, 'question_id' => 175, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 673, 'title' => 'Office', 'correct' => 0, 'question_id' => 175, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 674, 'title' => '40 sekund', 'correct' => 0, 'question_id' => 176, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 675, 'title' => '60 sekund', 'correct' => 0, 'question_id' => 176, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 676, 'title' => '30 sekund', 'correct' => 0, 'question_id' => 176, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 677, 'title' => '45 sekund', 'correct' => 1, 'question_id' => 176, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 678, 'title' => 'polską', 'correct' => 0, 'question_id' => 177, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 679, 'title' => 'rosyjską', 'correct' => 1, 'question_id' => 177, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 680, 'title' => 'szwedzką', 'correct' => 0, 'question_id' => 177, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 681, 'title' => 'ukraińską', 'correct' => 0, 'question_id' => 177, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 682, 'title' => '4', 'correct' => 1, 'question_id' => 178, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 683, 'title' => '3', 'correct' => 0, 'question_id' => 178, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 684, 'title' => '2', 'correct' => 0, 'question_id' => 178, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 685, 'title' => '5', 'correct' => 0, 'question_id' => 178, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 686, 'title' => 'Nova', 'correct' => 0, 'question_id' => 179, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 687, 'title' => 'Obrzyn', 'correct' => 1, 'question_id' => 179, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 688, 'title' => 'Mag-7', 'correct' => 0, 'question_id' => 179, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 689, 'title' => 'XM1014', 'correct' => 0, 'question_id' => 179, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 690, 'title' => 'Dwie Beretty', 'correct' => 1, 'question_id' => 180, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 691, 'title' => 'P250', 'correct' => 0, 'question_id' => 180, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 692, 'title' => 'P2000', 'correct' => 0, 'question_id' => 180, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 693, 'title' => 'Five-Seven', 'correct' => 0, 'question_id' => 180, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 694, 'title' => 'nie ma limitu', 'correct' => 0, 'question_id' => 181, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 695, 'title' => '15 000', 'correct' => 0, 'question_id' => 181, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 696, 'title' => '17 000', 'correct' => 0, 'question_id' => 181, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 697, 'title' => '16 000', 'correct' => 1, 'question_id' => 181, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 698, 'title' => 'Counter Strike 1.0/1.6 ITP.', 'correct' => 1, 'question_id' => 182, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 699, 'title' => 'Source', 'correct' => 0, 'question_id' => 182, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 700, 'title' => 'Global Offensive', 'correct' => 0, 'question_id' => 182, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 701, 'title' => 'Condition Zero', 'correct' => 0, 'question_id' => 182, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 702, 'title' => 'MP7', 'correct' => 0, 'question_id' => 183, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 703, 'title' => 'MP5', 'correct' => 1, 'question_id' => 183, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 704, 'title' => 'MP9', 'correct' => 0, 'question_id' => 183, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 705, 'title' => 'G3SG1', 'correct' => 0, 'question_id' => 183, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 706, 'title' => 'granat zapalający', 'correct' => 1, 'question_id' => 184, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 707, 'title' => 'granat dymny', 'correct' => 0, 'question_id' => 184, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 708, 'title' => 'granat zaczepny', 'correct' => 0, 'question_id' => 184, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 709, 'title' => 'koktajl Mołotowa', 'correct' => 0, 'question_id' => 184, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 710, 'title' => 'MAC-10', 'correct' => 0, 'question_id' => 185, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 711, 'title' => 'UMP-45', 'correct' => 0, 'question_id' => 185, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 712, 'title' => 'MP9', 'correct' => 1, 'question_id' => 185, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 713, 'title' => 'MP7', 'correct' => 0, 'question_id' => 185, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 714, 'title' => 'Galil AR', 'correct' => 1, 'question_id' => 186, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 715, 'title' => 'M4A1-S', 'correct' => 0, 'question_id' => 186, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 716, 'title' => 'FAMAS', 'correct' => 0, 'question_id' => 186, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 717, 'title' => 'M4A4', 'correct' => 0, 'question_id' => 186, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 718, 'title' => '2500$', 'correct' => 0, 'question_id' => 187, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 719, 'title' => '2700$', 'correct' => 1, 'question_id' => 187, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 720, 'title' => '2800$', 'correct' => 0, 'question_id' => 187, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 721, 'title' => '2600$', 'correct' => 0, 'question_id' => 187, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1078, 'title' => 'M249', 'correct' => 1, 'question_id' => 188, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 722, 'title' => 'M4A4', 'correct' => 0, 'question_id' => 188, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 723, 'title' => 'AWP', 'correct' => 0, 'question_id' => 188, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 724, 'title' => 'M4A1-S', 'correct' => 0, 'question_id' => 188, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 725, 'title' => 'NOVA', 'correct' => 0, 'question_id' => 189, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 726, 'title' => 'MAG-7', 'correct' => 0, 'question_id' => 189, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 727, 'title' => 'MAC-10', 'correct' => 1, 'question_id' => 189, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 728, 'title' => 'XM1014', 'correct' => 0, 'question_id' => 189, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 729, 'title' => '25', 'correct' => 1, 'question_id' => 190, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 730, 'title' => '30', 'correct' => 0, 'question_id' => 190, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 731, 'title' => '20', 'correct' => 0, 'question_id' => 190, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 732, 'title' => '35', 'correct' => 0, 'question_id' => 190, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 733, 'title' => 'SSG-08', 'correct' => 0, 'question_id' => 191, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 734, 'title' => 'AK-477', 'correct' => 0, 'question_id' => 191, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 735, 'title' => 'P90', 'correct' => 0, 'question_id' => 191, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 736, 'title' => 'AUG', 'correct' => 1, 'question_id' => 191, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 737, 'title' => '33 metry', 'correct' => 0, 'question_id' => 192, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 738, 'title' => '31 metrów', 'correct' => 1, 'question_id' => 192, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 739, 'title' => '30 metrów', 'correct' => 0, 'question_id' => 192, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 740, 'title' => '50 metrów', 'correct' => 0, 'question_id' => 192, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 741, 'title' => 'obok Czarnobyla', 'correct' => 1, 'question_id' => 193, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 742, 'title' => 'w górach', 'correct' => 0, 'question_id' => 193, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 743, 'title' => 'obok Nagasaki', 'correct' => 0, 'question_id' => 193, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 744, 'title' => 'obok Hiroshimy', 'correct' => 0, 'question_id' => 193, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 745, 'title' => 'MGE', 'correct' => 0, 'question_id' => 194, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 746, 'title' => 'Silver Master', 'correct' => 0, 'question_id' => 194, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 747, 'title' => 'Silver Master Elite', 'correct' => 0, 'question_id' => 194, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 748, 'title' => 'LEM', 'correct' => 1, 'question_id' => 194, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 749, 'title' => 'Asiimov', 'correct' => 1, 'question_id' => 195, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 750, 'title' => 'Wulkan', 'correct' => 0, 'question_id' => 195, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 751, 'title' => 'Tęczowe Utwardzenie', 'correct' => 0, 'question_id' => 195, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 752, 'title' => 'Pustynny Buntownik', 'correct' => 0, 'question_id' => 195, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 753, 'title' => 'Dust 2', 'correct' => 0, 'question_id' => 196, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 754, 'title' => 'Inferno', 'correct' => 0, 'question_id' => 196, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 755, 'title' => 'Cache', 'correct' => 1, 'question_id' => 196, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 756, 'title' => 'Nuke', 'correct' => 0, 'question_id' => 196, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 757, 'title' => '6', 'correct' => 1, 'question_id' => 197, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 758, 'title' => '7', 'correct' => 0, 'question_id' => 197, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 759, 'title' => '5', 'correct' => 0, 'question_id' => 197, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 760, 'title' => '4', 'correct' => 0, 'question_id' => 197, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 761, 'title' => '3', 'correct' => 0, 'question_id' => 198, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 762, 'title' => '6', 'correct' => 0, 'question_id' => 198, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 763, 'title' => '5', 'correct' => 1, 'question_id' => 198, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 764, 'title' => '4', 'correct' => 0, 'question_id' => 198, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 765, 'title' => 'Mirage', 'correct' => 0, 'question_id' => 199, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 766, 'title' => 'Nuke', 'correct' => 1, 'question_id' => 199, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 767, 'title' => 'Inferno', 'correct' => 0, 'question_id' => 199, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 768, 'title' => 'Dust 2', 'correct' => 0, 'question_id' => 199, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 769, 'title' => 'Nuke', 'correct' => 0, 'question_id' => 200, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 770, 'title' => 'Cache', 'correct' => 0, 'question_id' => 200, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 771, 'title' => 'Overpass', 'correct' => 1, 'question_id' => 200, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 772, 'title' => 'Cobblestone', 'correct' => 0, 'question_id' => 200, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 773, 'title' => 'Bank', 'correct' => 0, 'question_id' => 201, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 774, 'title' => 'Lake', 'correct' => 0, 'question_id' => 201, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 775, 'title' => 'Militia', 'correct' => 1, 'question_id' => 201, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 776, 'title' => 'Safehouse', 'correct' => 0, 'question_id' => 201, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 777, 'title' => 'Nuke', 'correct' => 1, 'question_id' => 202, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 778, 'title' => 'Mirage', 'correct' => 0, 'question_id' => 202, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 779, 'title' => 'Inferno', 'correct' => 0, 'question_id' => 202, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 780, 'title' => 'Dust 2', 'correct' => 0, 'question_id' => 202, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 781, 'title' => 'z Francji', 'correct' => 0, 'question_id' => 203, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 782, 'title' => 'z Chin', 'correct' => 0, 'question_id' => 203, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 783, 'title' => 'z Włoch', 'correct' => 1, 'question_id' => 203, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 784, 'title' => 'z Niemiec', 'correct' => 0, 'question_id' => 203, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 785, 'title' => 'Olga macht das Fenster auf.', 'correct' => 1, 'question_id' => 204, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 786, 'title' => 'Olga macht auf das Fenster.', 'correct' => 0, 'question_id' => 204, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 787, 'title' => 'Macht Olga das Fenster auf.', 'correct' => 0, 'question_id' => 204, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 788, 'title' => 'Olga aufmacht das Fenster.', 'correct' => 0, 'question_id' => 204, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 789, 'title' => 'Ich habe heute bis 10:00 Uhr geschlafen.', 'correct' => 1, 'question_id' => 205, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 790, 'title' => 'Ich habe heute bis 10:00 Uhr schlafen.', 'correct' => 0, 'question_id' => 205, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 791, 'title' => 'Ich habe heute bis 10:00 Uhr schlaft.', 'correct' => 0, 'question_id' => 205, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 792, 'title' => 'Ich habe heute bis 10:00 Uhr geschlaft.', 'correct' => 0, 'question_id' => 205, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 793, 'title' => 'Ich gehe in Hause.', 'correct' => 0, 'question_id' => 206, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 794, 'title' => 'Ich gehe nach Hause.', 'correct' => 1, 'question_id' => 206, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 795, 'title' => 'Ich gehe von Hause.', 'correct' => 0, 'question_id' => 206, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 796, 'title' => 'Ich gehe aus Hause.', 'correct' => 0, 'question_id' => 206, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 797, 'title' => 'Bücher', 'correct' => 0, 'question_id' => 207, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 798, 'title' => 'Hefte', 'correct' => 0, 'question_id' => 207, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 799, 'title' => 'Zeitschriften', 'correct' => 0, 'question_id' => 207, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 800, 'title' => 'Stühler', 'correct' => 1, 'question_id' => 207, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 801, 'title' => 'Ich mache mein Hausaufgaben im Café.', 'correct' => 0, 'question_id' => 208, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 802, 'title' => 'Ich mache meinem Hausaufgaben im Café.', 'correct' => 0, 'question_id' => 208, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 803, 'title' => 'Ich mache meine Hausaufgaben im Café.', 'correct' => 1, 'question_id' => 208, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 804, 'title' => 'Ich mache meinen Hausaufgaben im Café.', 'correct' => 0, 'question_id' => 208, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 805, 'title' => 'Wer ist der Mann? Kennst du ihm?', 'correct' => 0, 'question_id' => 209, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 806, 'title' => 'Wer ist der Mann? Kennst du ein?', 'correct' => 0, 'question_id' => 209, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 807, 'title' => 'Wer ist der Mann? Kennst du er?', 'correct' => 0, 'question_id' => 209, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 808, 'title' => 'Wer ist der Mann? Kennst du ihn?', 'correct' => 1, 'question_id' => 209, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 809, 'title' => '... und ich gehe nach Hause.', 'correct' => 0, 'question_id' => 210, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 810, 'title' => '... dann wir lernen viel Deutsch.', 'correct' => 0, 'question_id' => 210, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 811, 'title' => '... oder wir lernen viel Deutsch.', 'correct' => 0, 'question_id' => 210, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 812, 'title' => '... aber ich habe keine Lust.', 'correct' => 1, 'question_id' => 210, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 813, 'title' => 'Meine Freundin, der ich seit drei Jahren kenne, heiratet nächste Woche.', 'correct' => 0, 'question_id' => 211, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 814, 'title' => 'Meine Freundin, das ich seit drei Jahren kenne, heiratet nächste Woche.', 'correct' => 0, 'question_id' => 211, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 815, 'title' => 'Meine Freundin, sie ich seit drei Jahren kenne, heiratet nächste Woche.', 'correct' => 0, 'question_id' => 211, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 816, 'title' => 'Meine Freundin, die ich seit drei Jahren kenne, heiratet nächste Woche.', 'correct' => 1, 'question_id' => 211, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 817, 'title' => 'Ein Hund ist mehr groß wie eine Maus.', 'correct' => 0, 'question_id' => 212, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 818, 'title' => 'Ein Hund ist größer wie eine Maus.', 'correct' => 0, 'question_id' => 212, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 819, 'title' => 'Ein Hund ist mehr groß als eine Maus.', 'correct' => 0, 'question_id' => 212, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 820, 'title' => 'Ein Hund ist größer als eine Maus.', 'correct' => 1, 'question_id' => 212, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 821, 'title' => 'Ich lese gerne Bücher, aber ich gehe besser ins Kino.', 'correct' => 0, 'question_id' => 213, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 822, 'title' => 'Ich lese gerne Bücher, aber ich gehe mehr gern ins Kino.', 'correct' => 0, 'question_id' => 213, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 823, 'title' => 'Ich lese gerne Bücher, aber ich gehe lieber ins Kino.', 'correct' => 1, 'question_id' => 213, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 824, 'title' => 'Ich lese gerne Bücher, aber ich gehe gerner ins Kino.', 'correct' => 0, 'question_id' => 213, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 825, 'title' => 'einschlaft', 'correct' => 0, 'question_id' => 214, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 826, 'title' => 'einschlafen', 'correct' => 0, 'question_id' => 214, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 827, 'title' => 'eingeschlafen', 'correct' => 1, 'question_id' => 214, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 828, 'title' => 'eingeschlaft', 'correct' => 0, 'question_id' => 214, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 829, 'title' => 'Ich würde Sie gerne bitten, mir Tee zu bringen', 'correct' => 0, 'question_id' => 215, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 830, 'title' => 'Könnte ich bitte einen Tee haben?', 'correct' => 1, 'question_id' => 215, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 831, 'title' => 'Könnte ich mal einen Tee haben?', 'correct' => 0, 'question_id' => 215, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 832, 'title' => 'Ich möchte Tee, bitte.', 'correct' => 0, 'question_id' => 215, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 833, 'title' => 'Tut mir Leid, ich kann Dir leider nicht helfen.', 'correct' => 0, 'question_id' => 216, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 834, 'title' => 'Tut mir Leid, ich kann Ihnen leider nicht helfen.', 'correct' => 1, 'question_id' => 216, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 835, 'title' => 'Tut mir Leid, ich kann Sie leider nicht helfen.', 'correct' => 0, 'question_id' => 216, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 836, 'title' => 'Tut mir Leid, ich kann dich leider nicht helfen.', 'correct' => 0, 'question_id' => 216, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 837, 'title' => 'Ja, ich ihm habe es schon gegeben.', 'correct' => 0, 'question_id' => 217, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 838, 'title' => 'Ja, ich schon habe es ihm gegeben.', 'correct' => 0, 'question_id' => 217, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 839, 'title' => 'Ja, ich habe es ihm schon gegeben.', 'correct' => 0, 'question_id' => 217, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 840, 'title' => 'Ja, ich habe ihm es schon gegeben.', 'correct' => 1, 'question_id' => 217, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 841, 'title' => 'In der Schule viele Bücher müssen gelesen werden.', 'correct' => 0, 'question_id' => 218, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 842, 'title' => 'In der Schule muss viele Bücher gelesen werden.', 'correct' => 0, 'question_id' => 218, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 843, 'title' => 'In der Schule müssen viele Bücher gelesen werden.', 'correct' => 1, 'question_id' => 218, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 844, 'title' => 'In der Schule viele Bücher gelesen werden müssen.', 'correct' => 0, 'question_id' => 218, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 845, 'title' => 'Hat jemand für mich angerufen?', 'correct' => 1, 'question_id' => 219, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 846, 'title' => 'Hat eine Person für mich angerufen?', 'correct' => 0, 'question_id' => 219, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 847, 'title' => 'Hat nirgendwer für mich angerufen?', 'correct' => 0, 'question_id' => 219, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 848, 'title' => 'Hat ein Mensch für mich angerufen?', 'correct' => 0, 'question_id' => 219, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 849, 'title' => 'Weil sie ihre Arbeit schon hatte erledigt, ging sie früher nach Hause.', 'correct' => 0, 'question_id' => 220, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 851, 'title' => 'Weil sie ihre Arbeit schon hat erledigt, ging sie früher nach Hause.', 'correct' => 0, 'question_id' => 220, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 852, 'title' => 'Weil sie ihre Arbeit schon erledigt hat, ging sie früher nach Hause.', 'correct' => 1, 'question_id' => 220, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 853, 'title' => 'Weil sie ihre Arbeit schon erledigt hatte, ging sie früher nach Hause.', 'correct' => 0, 'question_id' => 220, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 854, 'title' => 'Sie hätte im Lotto gewonnen.', 'correct' => 0, 'question_id' => 221, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 855, 'title' => 'Sie wurde im Lotto gewonnen haben.', 'correct' => 0, 'question_id' => 221, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 856, 'title' => 'Sie wird im Lotto gewinnen.', 'correct' => 0, 'question_id' => 221, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 857, 'title' => 'Sie wird im Lotto gewonnen haben.', 'correct' => 1, 'question_id' => 221, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 858, 'title' => 'Er ist vielleicht krank.', 'correct' => 1, 'question_id' => 222, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 859, 'title' => 'Er war letzte Woche krank, und ist es immer noch.', 'correct' => 0, 'question_id' => 222, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 860, 'title' => 'Die Leute wollen, dass er krank ist.', 'correct' => 0, 'question_id' => 222, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 861, 'title' => 'Er ist mit Sicherheit krank.', 'correct' => 0, 'question_id' => 222, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 862, 'title' => 'Sie sagt, ihr Französisch müsse besser werden.', 'correct' => 1, 'question_id' => 223, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 863, 'title' => 'Sie sagt, ihr Französisch müsse verbessern.', 'correct' => 0, 'question_id' => 223, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 864, 'title' => 'Sie sagt, sie werde mehr Französisch lernen.', 'correct' => 0, 'question_id' => 223, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 865, 'title' => 'Sie sagt, dass ihr Französisch verbessere.', 'correct' => 0, 'question_id' => 223, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 866, 'title' => 'Er fragt, ob sie ihm sagen könnte, wie spät es war.', 'correct' => 0, 'question_id' => 224, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 867, 'title' => 'Er fragt, ob sie ihm sagen konnte, wie spät es sei.', 'correct' => 0, 'question_id' => 224, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 868, 'title' => 'Er fragt, ob sie ihm sagen könne, wie spät es gewesen wäre.', 'correct' => 0, 'question_id' => 224, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 869, 'title' => 'Er fragt, ob sie ihm sagen könne, wie spät es ist.', 'correct' => 1, 'question_id' => 224, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 870, 'title' => 'Nächste Woche werden wir die Arbeit geendet haben.', 'correct' => 0, 'question_id' => 225, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 871, 'title' => 'Nächste Woche werden wir die Arbeit beendet haben.', 'correct' => 1, 'question_id' => 225, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 872, 'title' => 'Nächste Woche werden wir die Arbeit beendet sein.', 'correct' => 0, 'question_id' => 225, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 873, 'title' => 'Nächste Woche wird die Arbeit beendet haben.', 'correct' => 0, 'question_id' => 225, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 874, 'title' => 'Entlang deiner Hilfe konnte ich die Arbeit schnell beenden.', 'correct' => 0, 'question_id' => 226, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 875, 'title' => 'Danke deiner Hilfe konnte ich die Arbeit schnell beenden.', 'correct' => 0, 'question_id' => 226, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 876, 'title' => 'Weil deiner Hilfe konnte ich die Arbeit schnell beenden.', 'correct' => 0, 'question_id' => 226, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 877, 'title' => 'Dank deiner Hilfe konnte ich die Arbeit schnell beenden.', 'correct' => 1, 'question_id' => 226, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 878, 'title' => 'Nadine hat sehr viel Arbeit und kommt jeden Abend total gestresst nach Hause.', 'correct' => 1, 'question_id' => 227, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 879, 'title' => 'Nadine hat sehr viel Arbeit und kommt jeden Abend total stressiert nach Hause.', 'correct' => 0, 'question_id' => 227, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 880, 'title' => 'Nadine hat sehr viel Arbeit und kommt jeden Abend total stressend nach Hause.', 'correct' => 0, 'question_id' => 227, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 881, 'title' => 'Nadine hat sehr viel Arbeit und kommt jeden Abend total stressig nach Hause.', 'correct' => 0, 'question_id' => 227, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1079, 'title' => 'Alles, welches Sie für den Kurs brauchen, steht auf diesem Zettel.', 'correct' => 0, 'question_id' => 228, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 882, 'title' => 'Alles, was Sie für den Kurs brauchen, steht auf diesem Zettel.', 'correct' => 1, 'question_id' => 228, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 883, 'title' => 'Alles, solches Sie für den Kurs brauchen, steht auf diesem Zettel.', 'correct' => 0, 'question_id' => 228, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 884, 'title' => 'Alles, das Sie für den Kurs brauchen, steht auf diesem Zettel.', 'correct' => 0, 'question_id' => 228, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 885, 'title' => 'Około 3 minut', 'correct' => 1, 'question_id' => 229, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 886, 'title' => 'Około 8 minut', 'correct' => 0, 'question_id' => 229, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 887, 'title' => 'Około 1 minuty', 'correct' => 0, 'question_id' => 229, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 888, 'title' => '15 minut', 'correct' => 0, 'question_id' => 229, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 889, 'title' => 'Surowych', 'correct' => 1, 'question_id' => 230, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 890, 'title' => 'Pieczonych', 'correct' => 0, 'question_id' => 230, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 891, 'title' => 'Ugotowanych', 'correct' => 0, 'question_id' => 230, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 892, 'title' => 'Przygotowywanie przetworów z owoców', 'correct' => 0, 'question_id' => 231, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 893, 'title' => 'Inna nazwa gotowania na parze', 'correct' => 0, 'question_id' => 231, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 894, 'title' => 'Metoda konserwowania mięsa', 'correct' => 1, 'question_id' => 231, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 895, 'title' => 'Marynowanie potrawy w sosie sojowym', 'correct' => 0, 'question_id' => 231, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 896, 'title' => 'Chrzanu', 'correct' => 1, 'question_id' => 232, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 897, 'title' => 'Cebuli', 'correct' => 0, 'question_id' => 232, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 898, 'title' => 'Tymianku', 'correct' => 0, 'question_id' => 232, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 899, 'title' => 'Octu', 'correct' => 0, 'question_id' => 232, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1080, 'title' => 'Drobny makaron', 'correct' => 0, 'question_id' => 233, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1081, 'title' => 'Śmietana i świeże owoce', 'correct' => 0, 'question_id' => 233, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1082, 'title' => 'Ryż', 'correct' => 1, 'question_id' => 233, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1083, 'title' => 'Pasta z bakłażanów', 'correct' => 0, 'question_id' => 233, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 1084, 'title' => 'Pieczone jabłka', 'correct' => 0, 'question_id' => 234, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1085, 'title' => 'Suszone i wędzone owoce', 'correct' => 0, 'question_id' => 234, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1086, 'title' => 'Ciasto drożdżowe i twaróg', 'correct' => 0, 'question_id' => 234, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1087, 'title' => 'Mak i pszenica', 'correct' => 1, 'question_id' => 234, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1088, 'title' => 'Kluski gotowane na parze', 'correct' => 1, 'question_id' => 235, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1089, 'title' => 'Knedle z grzybami', 'correct' => 0, 'question_id' => 235, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 900, 'title' => 'Kluski z tartych surowych ziemniaków', 'correct' => 0, 'question_id' => 235, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 901, 'title' => 'Pierożki z nadzieniem makowym', 'correct' => 0, 'question_id' => 235, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 902, 'title' => 'Żydowskiej', 'correct' => 1, 'question_id' => 236, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 903, 'title' => 'Węgierskiej', 'correct' => 0, 'question_id' => 236, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 904, 'title' => 'Białoruskiej', 'correct' => 0, 'question_id' => 236, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 905, 'title' => 'Kaszubskiej', 'correct' => 0, 'question_id' => 236, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 906, 'title' => 'Kraków', 'correct' => 1, 'question_id' => 237, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 907, 'title' => 'Pułtusk', 'correct' => 0, 'question_id' => 237, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 908, 'title' => 'Gdańsk', 'correct' => 0, 'question_id' => 237, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 909, 'title' => 'Olkusz', 'correct' => 0, 'question_id' => 237, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 910, 'title' => 'Żuru', 'correct' => 1, 'question_id' => 238, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 911, 'title' => 'Maślanki', 'correct' => 0, 'question_id' => 238, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 912, 'title' => 'Buraków', 'correct' => 0, 'question_id' => 238, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 913, 'title' => 'Grochu', 'correct' => 0, 'question_id' => 238, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 914, 'title' => 'Żentyca', 'correct' => 1, 'question_id' => 239, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 915, 'title' => 'Gramatka', 'correct' => 0, 'question_id' => 239, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 916, 'title' => 'Myrdyrda', 'correct' => 0, 'question_id' => 239, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 917, 'title' => 'Podkłótka', 'correct' => 0, 'question_id' => 239, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 918, 'title' => 'Zupa rybna', 'correct' => 0, 'question_id' => 240, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 919, 'title' => 'Babka ziemniaczana', 'correct' => 0, 'question_id' => 240, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 920, 'title' => 'Wódka zaprawiona ziołami i miodem', 'correct' => 0, 'question_id' => 240, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 921, 'title' => 'Dojrzewająca wędlina', 'correct' => 1, 'question_id' => 240, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 922, 'title' => 'Botwinka', 'correct' => 0, 'question_id' => 241, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 923, 'title' => 'Mizeria', 'correct' => 0, 'question_id' => 241, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 924, 'title' => 'Duszona marchew', 'correct' => 0, 'question_id' => 241, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 925, 'title' => 'Modra kapusta', 'correct' => 1, 'question_id' => 241, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 926, 'title' => 'Smażone drobne rybki', 'correct' => 0, 'question_id' => 242, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 927, 'title' => 'Kluski drożdżowe', 'correct' => 0, 'question_id' => 242, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 928, 'title' => 'Pyzy ziemniaczane z farszem', 'correct' => 1, 'question_id' => 242, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 929, 'title' => 'Racuszki z owocami', 'correct' => 0, 'question_id' => 242, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 930, 'title' => 'Na Dolnym Śląsku', 'correct' => 0, 'question_id' => 243, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 931, 'title' => 'Na Podhalu', 'correct' => 1, 'question_id' => 243, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 932, 'title' => 'Na Pomorzu', 'correct' => 0, 'question_id' => 243, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 933, 'title' => 'Na Kaszubach', 'correct' => 0, 'question_id' => 243, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 934, 'title' => 'Zupa na bazie włoszczyzny i ziemniaków', 'correct' => 0, 'question_id' => 244, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 935, 'title' => 'Potrawa z ziemniaków i twarogu', 'correct' => 1, 'question_id' => 244, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 936, 'title' => 'Kasza jęczmienna ze skwarkami', 'correct' => 0, 'question_id' => 244, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 937, 'title' => 'Zasmażana młoda kapusta', 'correct' => 0, 'question_id' => 244, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 938, 'title' => 'Suwalszczyzny', 'correct' => 0, 'question_id' => 245, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 939, 'title' => 'Lubelszczyzny', 'correct' => 1, 'question_id' => 245, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 940, 'title' => 'Kaszub', 'correct' => 0, 'question_id' => 245, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 941, 'title' => 'Warmii', 'correct' => 0, 'question_id' => 245, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 942, 'title' => 'Śliwki', 'correct' => 0, 'question_id' => 246, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 943, 'title' => 'Cytryna', 'correct' => 0, 'question_id' => 246, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 944, 'title' => 'Czarne porzeczki', 'correct' => 1, 'question_id' => 246, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 945, 'title' => 'Jarzębina', 'correct' => 0, 'question_id' => 246, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 946, 'title' => 'Ile pasków ma stonka ziemniaczana?', 'correct' => 0, 'question_id' => 247, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 947, 'title' => 'Ile skrzydeł ma ważka?', 'correct' => 0, 'question_id' => 247, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 948, 'title' => 'Ile nóg ma rak błotny?', 'correct' => 0, 'question_id' => 247, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 949, 'title' => 'Ile kropek ma biedronka, zwana bożą krówką?', 'correct' => 1, 'question_id' => 247, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 950, 'title' => 'Ile pełnych tygodni występuje w miesiącu?', 'correct' => 0, 'question_id' => 248, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 951, 'title' => 'Ile szczytów górskich liczy Korona Himalajów i Karakorum?', 'correct' => 0, 'question_id' => 248, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 952, 'title' => 'Ile dekad liczy wiek?', 'correct' => 0, 'question_id' => 248, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 953, 'title' => 'Ile jest cudów świata?', 'correct' => 1, 'question_id' => 248, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 954, 'title' => 'Ile książek liczy seria o Ani Shirley (Ani z Zielonego Wzgórza)?', 'correct' => 0, 'question_id' => 249, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 955, 'title' => 'Ile powieści liczy seria o Harrym Potterze?', 'correct' => 1, 'question_id' => 249, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 956, 'title' => 'Ile tomów liczy "Wojna i pokój"?', 'correct' => 0, 'question_id' => 249, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 957, 'title' => 'Ile powieści liczy "Saga rodu Forsyte’ów"?', 'correct' => 0, 'question_id' => 249, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 958, 'title' => 'Ile kobiet zabrał Noe na Arkę?', 'correct' => 0, 'question_id' => 250, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 959, 'title' => 'Ile jest grzechów głównych?', 'correct' => 1, 'question_id' => 250, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 960, 'title' => 'Ile było panien mądrych w biblijnej przypowieści?', 'correct' => 0, 'question_id' => 250, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 961, 'title' => 'Ile było plag egipskich?', 'correct' => 0, 'question_id' => 250, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 962, 'title' => 'Ile świnek walczyło ze złym wilkiem w angielskiej baśni ludowej?', 'correct' => 0, 'question_id' => 251, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 963, 'title' => 'Ile łóżeczek zastała królewna Śnieżka w chatce krasnoludków?', 'correct' => 1, 'question_id' => 251, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 964, 'title' => 'Ilu rozbójników oszukał Ali-Baba?', 'correct' => 0, 'question_id' => 251, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 965, 'title' => 'Ile wagonów miała "Lokomotywa" Tuwima?', 'correct' => 0, 'question_id' => 251, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 966, 'title' => 'Ilu samurajów broniło japońskiej wioski w filmie Akiry Kurosawy? ', 'correct' => 1, 'question_id' => 252, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 967, 'title' => 'Ilu muszkieterów jest głównymi bohaterami powieści Aleksandra Dumas?', 'correct' => 0, 'question_id' => 252, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 968, 'title' => 'Ilu gniewnych ludzi doprowadza do uniewinnienia młodego chłopaka w filmie Sydney’a Lumeta?', 'correct' => 0, 'question_id' => 252, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 969, 'title' => 'Ilu małych Murzynków występuje w tytule powieści Agathy Christie?', 'correct' => 0, 'question_id' => 252, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 970, 'title' => 'Na której księdze kończą się przygody małej małpki Fiki-Miki?', 'correct' => 0, 'question_id' => 253, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 971, 'title' => 'Uczniem której klasy był Adam Cisowski, bohater powieści Kornela Makuszyńskiego?', 'correct' => 1, 'question_id' => 253, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 972, 'title' => 'W której księdze swoich przygód Koziołek Matołek dociera do Pacanowa?', 'correct' => 0, 'question_id' => 253, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 973, 'title' => 'O której godzinie w Akademii Pana Kleksa jest pobudka?', 'correct' => 0, 'question_id' => 253, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['id' => 974, 'title' => 'Włodzimierz', 'correct' => 0, 'question_id' => 254, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 975, 'title' => 'Jacek', 'correct' => 0, 'question_id' => 254, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 976, 'title' => 'Dariusz', 'correct' => 1, 'question_id' => 254, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 977, 'title' => 'Szymon', 'correct' => 0, 'question_id' => 254, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 978, 'title' => 'Kamil', 'correct' => 0, 'question_id' => 255, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 979, 'title' => 'Mateusz', 'correct' => 1, 'question_id' => 255, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 980, 'title' => 'Grzegorz', 'correct' => 0, 'question_id' => 255, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 981, 'title' => 'Tadeusz', 'correct' => 0, 'question_id' => 255, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 982, 'title' => 'Bartłomiej', 'correct' => 0, 'question_id' => 256, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 983, 'title' => 'Przemysław', 'correct' => 1, 'question_id' => 256, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 984, 'title' => 'Marcin', 'correct' => 0, 'question_id' => 256, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 985, 'title' => 'Michał', 'correct' => 0, 'question_id' => 256, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 986, 'title' => 'Tomasz', 'correct' => 1, 'question_id' => 257, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 987, 'title' => 'Karol', 'correct' => 0, 'question_id' => 257, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 988, 'title' => 'Bogdan', 'correct' => 0, 'question_id' => 257, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 989, 'title' => 'Paweł', 'correct' => 0, 'question_id' => 257, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 990, 'title' => 'Mieczysław', 'correct' => 0, 'question_id' => 258, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 991, 'title' => 'Waldemar', 'correct' => 0, 'question_id' => 258, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 992, 'title' => 'Włodzimierz', 'correct' => 1, 'question_id' => 258, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 993, 'title' => 'Stanisław', 'correct' => 0, 'question_id' => 258, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 994, 'title' => 'Maciej', 'correct' => 0, 'question_id' => 259, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 995, 'title' => 'Tomasz', 'correct' => 1, 'question_id' => 259, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 996, 'title' => 'Grzegorz', 'correct' => 0, 'question_id' => 259, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 997, 'title' => 'Dawid', 'correct' => 0, 'question_id' => 259, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 998, 'title' => 'Jacek', 'correct' => 1, 'question_id' => 260, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 999, 'title' => 'Wojciech', 'correct' => 0, 'question_id' => 260, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1000, 'title' => 'Jerzy', 'correct' => 0, 'question_id' => 260, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1001, 'title' => 'Antoni', 'correct' => 0, 'question_id' => 260, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1002, 'title' => 'Tomasz', 'correct' => 1, 'question_id' => 261, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1003, 'title' => 'Roman', 'correct' => 0, 'question_id' => 261, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1004, 'title' => 'Aleksander', 'correct' => 0, 'question_id' => 261, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1005, 'title' => 'Mariusz', 'correct' => 0, 'question_id' => 261, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1006, 'title' => 'Tadeusz', 'correct' => 0, 'question_id' => 262, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1007, 'title' => 'Andrzej', 'correct' => 0, 'question_id' => 262, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1008, 'title' => 'Piotr', 'correct' => 0, 'question_id' => 262, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1009, 'title' => 'Janusz', 'correct' => 1, 'question_id' => 262, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1010, 'title' => 'Ignacy', 'correct' => 0, 'question_id' => 263, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1011, 'title' => 'Kamil', 'correct' => 0, 'question_id' => 263, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1012, 'title' => 'Piotr', 'correct' => 1, 'question_id' => 263, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1013, 'title' => 'Marek', 'correct' => 0, 'question_id' => 263, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],



            ['id' => 1014, 'title' => 'Chiny', 'correct' => 0, 'question_id' => 264, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1015, 'title' => 'Polska', 'correct' => 0, 'question_id' => 264, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1016, 'title' => 'Japonia', 'correct' => 1, 'question_id' => 264, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1017, 'title' => 'Czechy', 'correct' => 0, 'question_id' => 264, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1018, 'title' => 'Brazylia', 'correct' => 1, 'question_id' => 265, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1019, 'title' => 'Grecja', 'correct' => 0, 'question_id' => 265, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1020, 'title' => 'Tunezja', 'correct' => 0, 'question_id' => 265, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1021, 'title' => 'Czechy', 'correct' => 0, 'question_id' => 265, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1022, 'title' => 'Egipt', 'correct' => 0, 'question_id' => 266, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1023, 'title' => 'RPA', 'correct' => 1, 'question_id' => 266, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1024, 'title' => 'Wenezuela', 'correct' => 0, 'question_id' => 266, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1025, 'title' => 'Kanada', 'correct' => 0, 'question_id' => 266, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1026, 'title' => 'USA', 'correct' => 0, 'question_id' => 267, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1027, 'title' => 'Finlandia', 'correct' => 0, 'question_id' => 267, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1028, 'title' => 'Norwegia', 'correct' => 1, 'question_id' => 267, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1029, 'title' => 'Belgia', 'correct' => 0, 'question_id' => 267, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1030, 'title' => 'Portugalia', 'correct' => 0, 'question_id' => 268, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1031, 'title' => 'Kanada', 'correct' => 0, 'question_id' => 268, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1032, 'title' => 'Włochy', 'correct' => 1, 'question_id' => 268, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1033, 'title' => 'Hiszpania', 'correct' => 0, 'question_id' => 268, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1034, 'title' => 'Rosja', 'correct' => 0, 'question_id' => 269, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1035, 'title' => 'Francja', 'correct' => 1, 'question_id' => 269, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1036, 'title' => 'Portugalia', 'correct' => 0, 'question_id' => 269, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1037, 'title' => 'Szwecja', 'correct' => 0, 'question_id' => 269, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1038, 'title' => 'Niemcy', 'correct' => 0, 'question_id' => 270, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1039, 'title' => 'Szwajcaria', 'correct' => 1, 'question_id' => 270, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1040, 'title' => 'Austria', 'correct' => 0, 'question_id' => 270, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1041, 'title' => 'Portugalia', 'correct' => 0, 'question_id' => 270, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1042, 'title' => 'Turcja', 'correct' => 0, 'question_id' => 271, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1043, 'title' => 'Wietnam', 'correct' => 1, 'question_id' => 271, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1044, 'title' => 'Indie', 'correct' => 0, 'question_id' => 271, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1045, 'title' => 'Peru', 'correct' => 0, 'question_id' => 271, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1046, 'title' => 'Rumunia', 'correct' => 1, 'question_id' => 272, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1047, 'title' => 'Albania', 'correct' => 0, 'question_id' => 272, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1048, 'title' => 'Ukraina', 'correct' => 0, 'question_id' => 272, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1049, 'title' => 'Grecja', 'correct' => 0, 'question_id' => 272, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['id' => 1050, 'title' => 'Serbia', 'correct' => 0, 'question_id' => 273, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1051, 'title' => 'Rumunia', 'correct' => 0, 'question_id' => 273, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1052, 'title' => 'Węgry', 'correct' => 1, 'question_id' => 273, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 1053, 'title' => 'Czarnogóra', 'correct' => 0, 'question_id' => 273, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

             // 1079 last record
        ]);
    }
}
