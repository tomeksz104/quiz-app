<?php

namespace Database\Seeders;

use App\Enums\QuizStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->truncate();

        DB::table('quizzes')->insert([
            ['id' => 1, 'title' => 'Sprawdź ile wiesz o Polskiej historii!', 'slug' => 'sprawdz-ile-wiesz-o-polskiej-historii', 'category_id' => '2', 'user_id' => 1, 'description' => 'W tym quizie z historii Polski pytamy o najważniejsze zagadnienia z powojennej historii naszego kraju. Jeśli uczyliście się historii w polskiej szkole, to rozwiązanie tego quizu nie powinno być problemem. Jak sobie poradzicie?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'title' => 'Ciekawy quiz o hollywoodzkich filmach', 'slug' => 'ciekawy-quiz-o-hollywoodzkich-filmach', 'category_id' => '3', 'user_id' => 1, 'description' => 'Hollywood było domem dla wielu niesamowitych filmów, a niektóre z nich nie mogą być łatwo zapomniane, może ze względu na to, jak nudne lub niesamowite były. Jak myślisz, jak dobrze znasz się na hollywoodzkich filmach i rozrywce? Weź udział w tym ciekawym quizie i przekonaj się, jak uważnie przyglądałeś się różnym dziełom, które dało nam Hollywood.', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'title' => 'Polskie kino - w tym quizie wiek jest Twoim sprzymierzeńcem!', 'slug' => 'polskie-kino-w-tym-quizie-wiek-jest-twoim-sprzymierzencem', 'category_id' => '3', 'user_id' => 1, 'description' => 'Masz powyżej 55 lat? To znacznie zwiększa Twoje szanse w tym quizie! Kto jest reżyserem filmu "Kanał"? Kto zagrał główną rolę kobiecą w filmie "Lalka"? Sięgnij pamięcią do historii polskiego kina.', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'title' => 'Twoja wiedza o Macie powie, czy mógłbyś zostać jego menadżerem!', 'slug' => 'twoja-wiedza-o-macie-czy-moglbys-zostac-jego-menadzerem', 'category_id' => '6', 'user_id' => 1, 'description' => 'Przed Tobą trudne zadanie! Sprawdź, czy Twoja wiedza o Michale Matczaku jest wystarczająca, abyś objął posadę jego menadżera!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'title' => 'Sprawdź swoją wiedzę z filmu „To nie wypanda”!', 'slug' => 'sprawdz-swoja-wiedze-z-filmu-to-nie-wypanda', 'category_id' => '3', 'user_id' => 1, 'description' => 'Spróbuj zdobyć 10/10 punktów!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'title' => 'Jak dobrze pamiętasz światowe tradycje ślubne?', 'slug' => 'jak-dobrze-pamietasz-swiatowe-tradycje-slubne', 'category_id' => '1', 'user_id' => 1, 'description' => 'Sprawdź swoją wiedzę!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'title' => 'Ta para zerwała ze sobą w 2021 czy 2022 roku?', 'slug' => 'ta-para-zerwala-ze-soba-w-2021-czy-2022-roku', 'category_id' => '1', 'user_id' => 1, 'description' => 'Sprawdź, jak dobrze wiesz, w którym roku rozpadł się związek tej pary!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'title' => 'Quiz o samochodach sportowych!', 'slug' => 'quiz-o-samochodach-sportowych', 'category_id' => '14', 'user_id' => 1, 'description' => 'W tym Quizie sprawdzisz swoją wiedzę na temat samochodów! Powodzenia!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9, 'title' => 'Jak dobrze znasz historię samochodów?', 'slug' => 'jak-dobrze-znasz-historie-samochodow', 'category_id' => '14', 'user_id' => 1, 'description' => 'Tylko niewielki procent fanów zna historię logo producentów, nazw i początków motoryzacji. Czy Ty się do nich zaliczasz?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, 'title' => 'Jak dobrze znasz język internetu?', 'slug' => 'jak-dobrze-znasz-jezyk-internetu', 'category_id' => '7', 'user_id' => 1, 'description' => 'Jeśli regularnie korzystasz z internetu i udzielasz się w mediach społecznościowych, na pewno mówisz biegle w jego „języku”!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 11, 'title' => 'Milionerzy – Internet', 'slug' => 'milionerzy-internet', 'category_id' => '10', 'user_id' => 1, 'description' => 'Odpowiedz poprawnie na 12 pytań o internecie i zgarnij milion!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 12, 'title' => 'Czy uratujesz poszkodowanego w wypadku?', 'slug' => 'czy-uratujesz-poszkodowanego-w-wypadku', 'category_id' => '15', 'user_id' => 1, 'description' => 'Jechałeś spokojnie samochodem, aż tu nagle pod koła wbiegł człowiek! Czy uda Ci się go uratować?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 13, 'title' => '20 przełomowych wynalazków, które każdy dorosły powinien znać - co o nich wiesz?', 'slug' => '20-przelomowych-wynalazkow-ktore-kazdy-dorosly-powinien-znac-co-o-nich-wiesz', 'category_id' => '9', 'user_id' => 1, 'description' => 'Tę wiedzę zwyczajnie wypada mieć. A Ty? Jak sobie poradzisz z naszymi pytaniami?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 14, 'title' => 'Listonosz – czy dostaniesz dobrą wiadomość?', 'slug' => 'listonosz-czy-dostaniesz-dobra-wiadomosc', 'category_id' => '5', 'user_id' => 1, 'description' => 'Czy tytuł wystarczająco Cię zaintrygował? Odpowiedz na 10 pytań i przekonaj się, jaką wiadomość otrzymasz.', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 15, 'title' => 'Quiz wiedzy ogólnej z motywem panny - jak sobie poradzisz?', 'slug' => 'quiz-wiedzy-ogolnej-z-motywem-panny-jak-sobie-poradzisz', 'category_id' => '5', 'user_id' => 1, 'description' => '10 pytań i jeden motyw, czyli jak wypadniesz w quizie nawiązującym do tematu panny?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 16, 'title' => 'HTML CSS', 'slug' => 'html-css', 'category_id' => '9', 'user_id' => 1, 'description' => 'Zainteresowany tematyką quizu? No to zaczynamy!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 17, 'title' => 'Ile wiesz o "Counter Strike: Global Offensive"?', 'slug' => 'ile-wiesz-o-counter-strike-global-offensive', 'category_id' => '4', 'user_id' => 1, 'description' => 'Ile wiesz na temat tej odsłony kultowej strzelanki?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 18, 'title' => 'Na jakim poziomie jest Twój niemiecki?', 'slug' => 'na-jakim-poziomie-jest-twoj-niemiecki', 'category_id' => '11', 'user_id' => 1, 'description' => 'Podstawowy, średniozaawansowany, a może biegły? Przekonaj się, na jakim poziomie z niemieckiego jesteś!', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 19, 'title' => 'JEŚLI W KUCHNI GOTUJESZ TYLKO WODĘ NA HERBATĘ, NIE PORADZISZ SOBIE Z TYM KULINARNYM QUIZEM', 'slug' => 'jesli-w-kuchni-gotujesz-tylko-wode-na-herbate-nie-poradzisz=sobie-z-tym-quizem', 'category_id' => '12', 'user_id' => 1, 'description' => 'Umiesz gotować czy w kuchni jedynie odgrzewasz gotowe dania? Rozpoznajesz te przyprawy i narzędzia kuchenne? Żeby zdobyć komplet punktów, musisz mieć sporą wiedzę o gotowaniu.', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 20, 'title' => 'POLSKA KUCHNIA REGIONALNA - CO O NIEJ WIESZ?', 'slug' => 'polska-kuchnia-regionalna-co-o-niej-wiesz', 'category_id' => '12', 'user_id' => 1, 'description' => 'Ślepe ryby, kartacze, wareniki - w tym quizie możesz się wykazać znajomością polskiej kuchni regionalnej. Sprawdź, jak Ci pójdzie! Czy po rozwiązaniu całości poczujesz nagły przypływ apetytu?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 21, 'title' => 'SZYBKI QUIZ WOKÓŁ SIÓDEMKI, GDZIE WSZYSTKIE ODPOWIEDZI SĄ ZNANE I… TAKIE SAME', 'slug' => 'szybki-quiz-wokol-siodemki-gdzie-wszystkie-odpowiedzi-sa-znane-i-takie-same', 'category_id' => '10', 'user_id' => 1, 'description' => 'rzeba do podanej odpowiedzi dopasować pytanie. Zgadniesz wszystkie siedem? Jak wiadomo, siódemka to niezwykle szczęśliwa liczba, więc chyba można liczyć na dobry rezultat :)', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 22, 'title' => 'CZY UZUPEŁNISZ BRAKUJĄCE IMIONA POLSKICH KOMENTATORÓW SPORTOWYCH?', 'slug' => 'czy-uzupelnisz-brakujace-imiona-polskich-komentatorow-sportowych', 'category_id' => '8', 'user_id' => 1, 'description' => 'Top 10 polskich komentatorów sportowych, czyli najbardziej rozpoznawalne głosy polskiego sportu - te nazwiska znamy doskonale, czy z imionami pójdzie równie dobrze?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 23, 'title' => 'CZY WYSTARCZY CI JEDEN WYRAZ, BY ODGADNĄĆ, O JAKI KRAJ PYTAMY?', 'slug' => 'czy-wystarczy-ci-jeden-wyraz-by-odgadnac-o-jaki-kraj-pytamy', 'category_id' => '16', 'user_id' => 1, 'description' => 'Czy wystarczy jeden wyraz, by naprowadzić Cię na właściwe skojarzenie geograficzne?', 'time_for_answer' => 0, 'status' => QuizStatus::APPROVED, 'public' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
