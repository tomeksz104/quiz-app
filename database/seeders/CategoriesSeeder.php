<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            ['id' => 1, 'title' => 'Dla Par', 'description' => 'Miłość to piękna emocja, która sprawia, że kolory wydają się jaśniejsze. Zapachy wydają się cudowniejsze. Wypełnia nasze serca radością i stawia wiosnę w naszym kroku. Uczcijmy to uczucie dzięki tym niesamowitym quizom miłosnym, które dla Ciebie przygotowaliśmy. Pytania są starannie zaprojektowane, a odpowiedzi, które wybierzesz, pomogą nam w ocenie Twojego wyniku. Czy wiesz, która część mózgu kontroluje nasze hormony, gdy jesteśmy zakochani? Czy wiesz dlaczego ludzie zakochani wydają się szczęśliwsi i zdrowsi? Weź te quizy miłosne z takich tematów jak kompatybilność i przywiązanie, aby odkryć głębię miłości Twojej i Twojego partnera. Nasze dobrze zbadane quizy miłosne pomogą Ci znaleźć odpowiedzi na wszystkie pytania, które masz! Zacznij od Q & As i baw się dobrze!', 'slug' => 'dla-par', 'color' => '#ef4444'],
            ['id' => 2, 'title' => 'Historia', 'description' => 'Czy wiesz, które kraje odkrywały i kolonizowały obie Ameryki? Jak dużo wiesz o kontrowersyjnych osobowościach takich jak Hitler? Możesz przygotować się do nadchodzącego testu, po prostu być na bieżąco, a nawet uzyskać wgląd w tworzenie niesamowitych pytań dzięki tym quizom historycznym online.', 'slug' => 'historia', 'color' => '#22c55e'],
            ['id' => 3, 'title' => 'Filmy', 'description' => 'Światła! Kamera! Akcja! Wejdź do świata kina z tymi najlepszymi quizami filmowymi online, które rzucą wyzwanie temu, co wiesz i powiedzą ci, czego nie wiesz. Rozwiązywanie quizów to najfajniejsza rzecz, jaką można zrobić z filmami, poza ich oglądaniem.', 'slug' => 'filmy', 'color' => '#f59e0b'],
            ['id' => 4, 'title' => 'Gry komputerowe', 'description' => 'Gry wideo mogą być stymulujące dla twojego mózgu. Ale nie ma innego sposobu, aby utrzymać swój umysł pracujący niż najlepsze quizy z gier. Zbuduj swoją wiedzę dzięki quizom z gier online stworzonym dla różnych tematów. Wymień je, a my mamy je wszystkie. Możesz również tworzyć nowe quizy na wybrane przez siebie tematy i dzielić się nimi z przyjaciółmi.', 'slug' => 'gry-komputerowe', 'color' => '#f97316'],
            ['id' => 5, 'title' => 'Kultura', 'description' => 'Każda kultura jest inna, od miast, przez plemiona, po kulturę znajdującą się w tubce jogurtu! Ok, ignorując kulturę jogurtu, jest wiele kultur, które jedzą jogurt! Przygotuj się na pytania z całego świata, pytania, które będą cię dręczyć!Pytania takie jak "Jakie plemię w Indiach czci boga deszczu?", "Jakie są zwyczaje małżeńskie Maorysów?", "Co Amerykanie lubią jeść najczęściej?" i "Które plemię ludzi jest kanibalami?". Przy takich pytaniach szybko zaczniesz się zastanawiać, czy powinieneś więcej, czy po prostu pójść i kupić jogurt.', 'slug' => 'kultura', 'color' => '#10b981'],
            ['id' => 6, 'title' => 'Muzyka', 'description' => 'Rzuć wyzwanie quizom muzycznym online, aby sprawdzić swoją wiedzę i nauczyć się ciekawostek podczas gry.', 'slug' => 'muzyka', 'color' => '#14b8a6'],
            ['id' => 7, 'title' => 'Internet', 'description' => 'Czy szukasz pytań z zakresu wiedzy ogólnej o internecie, aby przygotować się do egzaminów konkurencyjnych? Dowiedz się nowych faktów i ciekawostek dzięki tym niesamowitym quizom internetowym online. Sprawdź się i podziel się tymi quizami, aby dowiedzieć się kto jest prawdziwym tech-wizardem! Pytania quizowe są dobrze opracowane, aby pomóc Ci nauczyć się wszystkiego od zagadek z przeglądarki po zagrożenia jakie możesz spotkać w wędrówce po internecie.', 'slug' => 'internet', 'color' => '#3b82f6'],
            ['id' => 8, 'title' => 'Sport', 'description' => 'Czy jesteś prawdziwym zawodowcem w swoich ulubionych dyscyplinach sportowych? Czy uważasz się za największego fana sportu? Dowiedz się raz na zawsze, ponieważ oferujemy Ci najbardziej wszechstronne quizy sportowe i ciekawostki. Sprawdź się i podziel się tymi quizami sportowymi ze swoimi przyjaciółmi i rówieśnikami, aby dowiedzieć się, kto jest prawdziwym mistrzem!', 'slug' => 'sport', 'color' => '#0ea5e9'],
            ['id' => 9, 'title' => 'Komputery i Technologia', 'description' => 'Te pytania technologiczne sprawdzą Twoją wiedzę na temat komputerów nowych i starych, języków programowania, przeglądarek internetowych i wyszukiwarek. Jeśli kiedykolwiek myślałeś, że spodobałby ci się quiz w pubie skoncentrowany na tematach takich jak oprogramowanie i technologia informacyjna, pokochasz grę w ten quiz technologiczny!', 'slug' => 'technologia', 'color' => '#6366f1'],
            ['id' => 10, 'title' => 'Rozrywka', 'description' => 'Szukasz zabawnego quizu do zagrania? Weź udział w tych niesamowitych quizach online, aby zdobyć wiedzę i pochwalić się nią. Zagraj w te zabawne quizy jako grę imprezową lub jeśli po prostu próbujesz zrobić sobie przerwę w pracy. Te niesamowite quizy są idealne dla dzieci, nastolatków i ciekawskich dorosłych też! Istnieją różne rodzaje pytań do wyboru, jak prawda czy fałsz, wielokrotnego wyboru, tak czy nie, i więcej.', 'slug' => 'rozrywka', 'color' => '#eab308'],
            ['id' => 11, 'title' => 'Języki obce', 'description' => 'Witam! Salut! Ciao! Bez względu na język, wszystkie one oznaczają mniej więcej to samo. Na świecie jest obecnie tak wiele języków, że byłoby niemożliwe, aby jedna osoba miała nawet bezpośredni kontakt z nimi wszystkimi w ciągu życia. Ale uważamy, że ten rodzaj różnorodności powinien być celebrowany i dlatego mamy dla Ciebie quizy językowe. Zanim je rozpoczniesz, powinieneś najpierw wypróbować próbki. Jaki jest obecnie najczęściej używany język romański na całym świecie? Jak nazywa się najbardziej mówiony wschodni język romansowy? Do jakiej gałęzi języków należy język angielski? Jakie są dwa główne języki używane w Belgii? Stań się biegły w każdym języku dzięki naszym quizom językowym.', 'slug' => 'jezyk-angielski', 'color' => '#8b5cf6'],
            ['id' => 12, 'title' => 'Jedzenie', 'description' => 'Interesuje Cię, co Twoje ulubione jedzenie mówi o Tobie? Chcesz wiedzieć, jak bardzo jesteś fanem jedzenia? Rozwiąż te niesamowite quizy online o jedzeniu, aby się tego dowiedzieć. Idealne dla dzieci, nastolatków i dorosłych, te quizy o jedzeniu mogą być rozgrywane jako gra imprezowa i mogą stanowić interesujące rozmowy podczas kolacji!', 'slug' => 'jedzenie', 'color' => '#84cc16'],
            ['id' => 13, 'title' => 'Fotografia', 'description' => 'Odpowiedz na pytania Quizu o fotografii w tym fantastycznym quizie. Nowoczesna fotografia może być bardzo skomplikowanym i zaangażowanym przedsięwzięciem. Jest wiele, co można wywnioskować z jednego zdjęcia i może opowiedzieć historię o tym, co działo się, gdy zostało zrobione. Rozwiąż ten podstawowy quiz o fotografii, aby dowiedzieć się, jak dużo wiesz o fotografii i czy zrobiłbyś w niej karierę. Wszystkiego najlepszego!', 'slug' => 'fotografia', 'color' => '#a855f7'],
            ['id' => 14, 'title' => 'Motoryzacja', 'description' => 'Witamy w naszym dziale gier quizowych o samochodach! Myślisz, że jesteś wielkim entuzjastą motoryzacji? Sprawdź, ile naprawdę wiesz, biorąc udział w jednym z naszych zabawnych quizów motoryzacyjnych. Nasze quizy samochodowe zawierają pytania wielokrotnego wyboru, pytania typu prawda-fałsz oraz quizy obrazkowe, które mają na celu dostarczenie entuzjastom motoryzacji, takim jak Ty, trudnego, a zarazem zabawnego zestawu pytań z dziedziny motoryzacji. Sprawdź swoją wiedzę o samochodach w różnych kategoriach związanych z motoryzacją, takich jak różne marki, modele, kultura samochodowa, wyścigi samochodowe i wiele innych.  Jeśli podobały ci się te quizy o samochodach, pamiętaj, aby podzielić się nimi ze znajomymi i sprawdzaj często, aby cieszyć się nowymi grami quizów o samochodach, które są często dodawane. Zacznij teraz!', 'slug' => 'motoryzacja', 'color' => '#d946ef'],
            ['id' => 15, 'title' => 'Zdrowie i Uroda', 'description' => 'Jak dobrze znasz swój ogólny stan zdrowia? Czy wiesz, jaki jest Twój stan zdrowia? Weź udział w naszych internetowych quizach zdrowotnych, aby sprawdzić swoją wiedzę na temat zdrowia, fitnessu, diety i odżywiania. Niezależnie od tego, czy jesteś maniakiem zdrowia, czy nie, będziesz zaskoczony tym, jak możesz poszerzyć swoją wiedzę o ludzkim ciele po wzięciu udziału w tych quizach.', 'slug' => 'zdrowie-i-uroda', 'color' => '#06b6d4'],
            ['id' => 16, 'title' => 'Kraje i Podróże', 'description' => 'Czy uważasz, że jesteś prawdziwym ekspertem w podróżowaniu? Rozwiązywanie quizów o krajach to najlepszy sposób na sprawdzenie swojej wiedzy o świecie. Baw się dobrze z tym skarbem quizów na temat różnych krajów, kontynentów, miast, obszarów geograficznych, kultur, pór roku, języka i wielu innych. Nadszedł najwyższy czas, aby uzupełnić swoją wiedzę o świecie, którą być może przegapiłeś w szkole. Możesz wybierać spośród naszych niesamowitych quizów o podróżach, obejmujących wiele tematów. Mapy, stolice, obszary geograficzne, flagi - wymień cokolwiek, my mamy wszystko. Jeśli w trakcie rozwiązywania quizu zdarzy Ci się wpadka, nie martw się, masz wszystkie poprawne odpowiedzi pod ręką, aby uzupełnić swoją kolekcję wiedzy. Jeśli chcesz, możesz podzielić się swoim wynikiem lub quizem o krajach z przyjaciółmi, zgodnie z ich zainteresowaniami.', 'slug' => 'podroze', 'color' => '#10b981'],
            ['id' => 17, 'title' => 'Misz masz', 'description' => 'Wszystko co nie pasowało do żadnej kategorii :)', 'slug' => 'miszmasz', 'color' => '#10b981'],
        ]);
    }
}
