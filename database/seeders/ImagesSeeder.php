<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();

        DB::table('images')->insert([
            ['id' => 1, 'path' => 'uploads/images/9XBtwVmUcDri6AwPPsRaygknpkMubyNjfmR5J9wP.jpg', 'imageable_id' => 1,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'path' => 'uploads/images/7kITZyZIMEA3tnY8fro80iMybHzy1WxESs3dn1OE.jpg', 'imageable_id' => 2,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'path' => 'uploads/images/bwd7zBm8yD8ijKwINmpHr18EAoae9cKjMXMfPDxk.jpg', 'imageable_id' => 3,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'path' => 'uploads/images/DVDYht3rHQtL1D43V2qWtLDKNZwTyUzQjXJaanq5.jpg', 'imageable_id' => 4,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'path' => 'uploads/images/F68YNXGJGNwiGOvFJWRrs34PJ8pi2ecmsJ7svXzE.jpg', 'imageable_id' => 5,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'path' => 'uploads/images/gaZ8yRf5UsIlhiydke4Fh1v3mKFZm6rr4cvPz0ua.jpg', 'imageable_id' => 6,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'path' => 'uploads/images/V5uEhDGH9r7tADR5Aewcy3T7VGkgNUfPl0ZbwBLO.png', 'imageable_id' => 7,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'path' => 'uploads/images/95IBCSzQkj03ntXXYHeqRWaxReSgWv0pogSW9opD.jpg', 'imageable_id' => 8,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9, 'path' => 'uploads/images/J5o2pU4irrSibQDNNtbPDXanUxfLpgbGIQ21joaK.jpg', 'imageable_id' => 9,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, 'path' => 'uploads/images/wx7tf5Hd9hAJd66gd7izOxPUQc5DXzBdEvRGPyy1.png', 'imageable_id' => 10,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 11, 'path' => 'uploads/images/3EjDozRLZ5hmN6nm4lSOA70rGbB77jRrOb0sq1Lx.jpg', 'imageable_id' => 11,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 12, 'path' => 'uploads/images/P295TlPSHNgfB3FOlk9Q9e2AGB6PNO9waOsGkRDk.jpg', 'imageable_id' => 12,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 13, 'path' => 'uploads/images/iBq6g6lNy1qMsQgTKgmqx9iLsIUdAyfwPakHGkRq.jpg', 'imageable_id' => 13,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 14, 'path' => 'uploads/images/DdOFqJBXHc1VJNTP12vkYvIV1ps0gEyR5id0OTdq.jpg', 'imageable_id' => 14,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 15, 'path' => 'uploads/images/UdnfjfG1V9XGC291arQP79kjFcga9Ojt6d0UeAhS.jpg', 'imageable_id' => 15,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 16, 'path' => 'uploads/images/K74BvFdyEUBs1EuE5DC2beY8uposxSl9gxHkZulB.png', 'imageable_id' => 16,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 17, 'path' => 'uploads/images/sQyBFcNLRhVILdEwk5v9G1fueXhzwpnySgysXuO6.jpg', 'imageable_id' => 17,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 18, 'path' => 'uploads/images/iVzKPafSDpRDMDQ7Xz5C4FHcYdP7GF8ZqdvRasky.jpg', 'imageable_id' => 18,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 19, 'path' => 'uploads/images/vgWv5SyCfJnobukkAfBKWolwxOdVEwIEMpK9SUIR.jpg', 'imageable_id' => 19,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 20, 'path' => 'uploads/images/EpLqaLTDcsrC12CvNmUkHUAdvscuTklKnLO8lSBJ.jpg', 'imageable_id' => 20,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 21, 'path' => 'uploads/images/39Gzrqr2vsyM4lRcCgvy7wRouzPLlrJXtJ73lWzY.jpg', 'imageable_id' => 21,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 22, 'path' => 'uploads/images/4rowpdqRMBtwxKckt5PaQ4yhdQhdw1gGIx1uzVLW.jpg', 'imageable_id' => 22,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 23, 'path' => 'uploads/images/Faqzvh7sKN7Tff0asAShq0EFywBe4QihsHHW9gap.jpg', 'imageable_id' => 23,'imageable_type' => 'App\Models\Quiz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            //Category
            ['id' => 24, 'path' => 'uploads/images/FmHoqirGgEVz6XNvwRJcX0prVTry9xnrPqgTAYI9.jpg', 'imageable_id' => 1,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 25, 'path' => 'uploads/images/UbHQTgdFfA3PNwT13FW5qyrSqqY8jeoil8ueEzKX.jpg', 'imageable_id' => 2,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 26, 'path' => 'uploads/images/da10WYbouRyWYDYEXH7EwxbWs3UQhlxdajccEQdk.jpg', 'imageable_id' => 3,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 27, 'path' => 'uploads/images/bCPGBdZqSKOu1yx1r1Vt4M8VvzNGMUUeyvZizNXH.jpg', 'imageable_id' => 4,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 28, 'path' => 'uploads/images/5GHwH2U4Mj9svgFf8WtPEfgHewrsRYdCiWwU0gKw.jpg', 'imageable_id' => 5,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 29, 'path' => 'uploads/images/mi3fOrqBRnuz4FHzaH80IFLOerCWaday9SJzLDTs.jpg', 'imageable_id' => 6,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 30, 'path' => 'uploads/images/d32G8rhpxiYWA6qqYEyAhCivzMjP1AE8K9MnVlYu.jpg', 'imageable_id' => 7,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 31, 'path' => 'uploads/images/AstrhMCRb7MHmZ31B4e1sxbDzdk3vORXCg1ttLKT.jpg', 'imageable_id' => 8,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 32, 'path' => 'uploads/images/Z9Bi415Ur3J2QCYHR6nZe33JAcGqEwV554P94DX0.jpg', 'imageable_id' => 9,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 33, 'path' => 'uploads/images/1AH5iyCa1pEo1Tw7fcQClemMvcdi4N5qafil4eeS.jpg', 'imageable_id' => 10,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 34, 'path' => 'uploads/images/qIrmLFXuLAQFqzlfcM1IMrP4GxXc9eelTgFqvXki.jpg', 'imageable_id' => 11,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 35, 'path' => 'uploads/images/5opGz7VosPe2CNHh6wgdrMoE3Su20N7gcynB6mJo.jpg', 'imageable_id' => 12,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 36, 'path' => 'uploads/images/bgY2n1a0um5dt9dEroQ7O1UXgR0sJBGeSLoBmgEq.jpg', 'imageable_id' => 13,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 37, 'path' => 'uploads/images/fX51YPxUWnebPkqReZ7SrCuaZcPJxy7NH7rTJPIQ.jpg', 'imageable_id' => 14,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 38, 'path' => 'uploads/images/Mcx0LdiBlXH7uHqXU5NI5d2HQx1N8IT0apJPqw2W.jpg', 'imageable_id' => 15,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 39, 'path' => 'uploads/images/S4nZYnPDKgCyRZi11HyBprsDUnyFnvxfVnOwPxNy.jpg', 'imageable_id' => 16,'imageable_type' => 'App\Models\Category', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Results
            ['id' => 40, 'path' => 'img/default-results/result-poorly.jpg', 'imageable_id' => 1,'imageable_type' => 'App\Models\ResultMessage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 41, 'path' => 'img/default-results/result-average.jpg', 'imageable_id' => 2,'imageable_type' => 'App\Models\ResultMessage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 42, 'path' => 'img/default-results/result-good.jpg', 'imageable_id' => 3,'imageable_type' => 'App\Models\ResultMessage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 43, 'path' => 'img/default-results/result-very-good.jpg', 'imageable_id' => 4,'imageable_type' => 'App\Models\ResultMessage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 44, 'path' => 'img/default-results/result-perfect.jpg', 'imageable_id' => 5,'imageable_type' => 'App\Models\ResultMessage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
