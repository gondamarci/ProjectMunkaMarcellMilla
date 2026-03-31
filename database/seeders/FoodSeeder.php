<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food::insert(
                [                    
                    // Sertéshúsok (100g)
                    ['foodname' => 'Sertés szűzpecsenye', 'calories' => 143, 'protein' => 21.0, 'carb' => 0.0, 'fat' => 6.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sertéscomb', 'calories' => 160, 'protein' => 21.0, 'carb' => 0.0, 'fat' => 8.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sertésoldalas (sült)', 'calories' => 320, 'protein' => 18.0, 'carb' => 0.0, 'fat' => 28.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sertészsír', 'calories' => 896, 'protein' => 0.1, 'carb' => 0.0, 'fat' => 99.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Szárnyasok (100g)
                    ['foodname' => 'Csirkemell filé (1 db ~150g)', 'calories' => 120, 'protein' => 22.5, 'carb' => 0.0, 'fat' => 2.6, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pulykamell filé (1 db ~150g)', 'calories' => 104, 'protein' => 24.0, 'carb' => 0.0, 'fat' => 1.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pulyka felsőcomb', 'calories' => 150, 'protein' => 19.0, 'carb' => 0.0, 'fat' => 8.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kacsacomb (sült, bőrrel)', 'calories' => 220, 'protein' => 18.0, 'carb' => 0.0, 'fat' => 16.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kacsamell (sült, bőrrel)', 'calories' => 200, 'protein' => 19.0, 'carb' => 0.0, 'fat' => 14.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Marhahúsok és Belsőségek (100g)
                    ['foodname' => 'Marhabélszín', 'calories' => 135, 'protein' => 22.0, 'carb' => 0.0, 'fat' => 5.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Marhanyak', 'calories' => 180, 'protein' => 19.0, 'carb' => 0.0, 'fat' => 11.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Csirkemáj (sült)', 'calories' => 170, 'protein' => 25.0, 'carb' => 1.0, 'fat' => 7.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Felvágottak és Feldolgozott húsok
                    ['foodname' => 'Csirkemell sonka (1 szelet ~15-20g)', 'calories' => 95, 'protein' => 18.0, 'carb' => 1.5, 'fat' => 2.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pulykamell sonka (1 szelet ~15-20g)', 'calories' => 90, 'protein' => 17.5, 'carb' => 1.0, 'fat' => 1.8, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Füstölt Bacon (1 szelet ~15g)', 'calories' => 540, 'protein' => 13.0, 'carb' => 1.0, 'fat' => 54.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Téliszalámi (1 szelet ~10g)', 'calories' => 520, 'protein' => 20.0, 'carb' => 1.0, 'fat' => 48.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Debreceni kolbász (1 pár ~100g)', 'calories' => 310, 'protein' => 15.0, 'carb' => 2.0, 'fat' => 27.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    
                    // Vadak és egyéb
                    ['foodname' => 'Vadhús (Szarvas/Őz)', 'calories' => 120, 'protein' => 23.0, 'carb' => 0.0, 'fat' => 2.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Nyúlhús', 'calories' => 115, 'protein' => 22.0, 'carb' => 0.0, 'fat' => 3.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    //Köretek
                    ['foodname' => 'Jázmin rizs (nyers)', 'calories' => 350, 'protein' => 7.0, 'carb' => 78.0, 'fat' => 0.6, 'fiber' => 1.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Bulgur (nyers)', 'calories' => 342, 'protein' => 12.0, 'carb' => 76.0, 'fat' => 1.3, 'fiber' => 18.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kuszkusz (nyers)', 'calories' => 376, 'protein' => 12.8, 'carb' => 77.0, 'fat' => 0.6, 'fiber' => 5.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Burgonya (1 közepes ~150g)', 'calories' => 77, 'protein' => 2.0, 'carb' => 17.0, 'fat' => 0.1, 'fiber' => 2.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Édesburgonya (1 közepes ~200g)', 'calories' => 86, 'protein' => 1.6, 'carb' => 20.1, 'fat' => 0.1, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sült burgonya (olaj nélkül, 100g)', 'calories' => 93, 'protein' => 2.0, 'carb' => 21.0, 'fat' => 0.1, 'fiber' => 2.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Hasábburgonya (mirelit, sütőben, 100g)', 'calories' => 150, 'protein' => 2.5, 'carb' => 25.0, 'fat' => 4.0, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Durum tészta (nyers, 100g)', 'calories' => 355, 'protein' => 12.5, 'carb' => 71.0, 'fat' => 1.5, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tojásos tészta (8 tojásos, nyers, 100g)', 'calories' => 395, 'protein' => 15.0, 'carb' => 68.0, 'fat' => 6.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Vöröslencse (nyers, 100g)', 'calories' => 353, 'protein' => 24.0, 'carb' => 63.0, 'fat' => 1.1, 'fiber' => 10.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Csicseriborsó (száraz, 100g)', 'calories' => 364, 'protein' => 19.3, 'carb' => 60.6, 'fat' => 6.0, 'fiber' => 17.4, 'created_at' => now(), 'updated_at' => now()],

                    //Tejtermékek
                    ['foodname' => 'Tojás (M-es, 1db ~50g)', 'calories' => 78, 'protein' => 6.5, 'carb' => 0.6, 'fat' => 5.3, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Főtt tojás (1 db ~50g)', 'calories' => 155, 'protein' => 13.0, 'carb' => 1.1, 'fat' => 11.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tükörtojás (1 db ~50g) - kevés olajjal)', 'calories' => 196, 'protein' => 13.5, 'carb' => 0.8, 'fat' => 15.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tojásrántotta (2 db-ból ~110g, vajjal/olajjal)', 'calories' => 170, 'protein' => 11.0, 'carb' => 1.5, 'fat' => 13.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tojásfehérje (Lé - 100g)', 'calories' => 52, 'protein' => 11.0, 'carb' => 0.7, 'fat' => 0.2, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tojássárgája (1 db ~17g)', 'calories' => 55, 'protein' => 2.7, 'carb' => 0.6, 'fat' => 4.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sovány túró', 'calories' => 80, 'protein' => 14.1, 'carb' => 3.8, 'fat' => 0.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Trappista sajt (1 szelet ~ 20g)', 'calories' => 352, 'protein' => 25.0, 'carb' => 0.0, 'fat' => 28.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Skyr (natúr, 1 pohár ~ 150g)', 'calories' => 63, 'protein' => 11.0, 'carb' => 4.0, 'fat' => 0.2, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tej (1,5%-os)', 'calories' => 44, 'protein' => 3.4, 'carb' => 4.7, 'fat' => 1.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tej (2,8%-os)', 'calories' => 56, 'protein' => 3.3, 'carb' => 4.6, 'fat' => 2.8, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Habtejszín (30%-os)', 'calories' => 292, 'protein' => 2.3, 'carb' => 3.1, 'fat' => 30.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tejföl (12%-os)', 'calories' => 134, 'protein' => 3.3, 'carb' => 3.9, 'fat' => 12.0, 'fiber' => 0.0, 'created_at' => now(),('updated_at') = > now()],
                    ['foodname' => 'Kefir', 'calories' => 46, 'protein' => 3.2, 'carb' => 4.4, 'fat' => 1.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Mozzarella sajt', 'calories' => 280, 'protein' => 22.0, 'carb' => 2.2, 'fat' => 20.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Feta sajt', 'calories' => 264, 'protein' => 14.0, 'carb' => 4.1, 'fat' => 21.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Camembert sajt', 'calories' => 299, 'protein' => 19.8, 'carb' => 0.5, 'fat' => 24.3, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Parmigiano Reggiano (Parmezán)', 'calories' => 431, 'protein' => 38.5, 'carb' => 4.1, 'fat' => 28.6, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Körözött (házi jellegű)', 'calories' => 145, 'protein' => 12.5, 'carb' => 3.5, 'fat' => 9.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    //Alternativ tejtermékek
                    ['foodname' => 'Mandulatej (cukrozatlan)', 'calories' => 13, 'protein' => 0.4, 'carb' => 0.1, 'fat' => 1.1, 'fiber' => 0.3, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Zabtej', 'calories' => 48, 'protein' => 1.1, 'carb' => 8.4, 'fat' => 0.8, 'fiber' => 0.8, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kókusztej (konzerv)', 'calories' => 197, 'protein' => 2.0, 'carb' => 2.8, 'fat' => 19.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    //Gyümölcsök / Zöldségek
                    ['foodname' => 'Banán (1 közepes héj nélkül ~120g)', 'calories' => 89, 'protein' => 1.1, 'carb' => 23.0, 'fat' => 0.3, 'fiber' => 2.6, 'created_at' => now(), 'updated_at' => now() ],
                    ['foodname' => 'Alma (1 közepes ~170g)', 'calories' => 52, 'protein' => 0.3, 'carb' => 14.0, 'fat' => 0.2, 'fiber' => 2.4, 'created_at' => now(), 'updated_at' => now() ],
                    ['foodname' => 'Áfonya (1 marék ~50g)', 'calories' => 57, 'protein' => 0.7, 'carb' => 14.5, 'fat' => 0.3, 'fiber' => 2.4, 'created_at' => now(), 'updated_at' => now() ],
                    ['foodname' => 'Kígyóuborka (1 db ~400g)', 'calories' => 15, 'protein' => 0.7, 'carb' => 3.6, 'fat' => 0.1, 'fiber' => 0.5, 'created_at' => now(), 'updated_at' => now() ],
                    ['foodname' => 'Paradicsom (1 közepes ~100g)', 'calories' => 18, 'protein' => 0.9, 'carb' => 3.9, 'fat' => 0.2, 'fiber' => 1.2, 'created_at' => now(), 'updated_at' => now() ],
                    ['foodname' => 'Brokkoli (nyers)', 'calories' => 34, 'protein' => 2.8, 'carb' => 6.6, 'fat' => 0.4, 'fiber' => 2.6, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sárgarépa (1 közepes ~70-80g)', 'calories' => 41, 'protein' => 0.9, 'carb' => 9.6, 'fat' => 0.2, 'fiber' => 2.8, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Édesburgonya (nyers)', 'calories' => 86, 'protein' => 1.6, 'carb' => 20.1, 'fat' => 0.1, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Eper (1 nagyobb szem ~15-20g)', 'calories' => 32, 'protein' => 0.7, 'carb' => 7.7, 'fat' => 0.3, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Narancs (1 közepes ~150g)', 'calories' => 47, 'protein' => 0.9, 'carb' => 11.8, 'fat' => 0.1, 'fiber' => 2.4, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Avokádó', 'calories' => 160, 'protein' => 2.0, 'carb' => 8.5, 'fat' => 14.7, 'fiber' => 6.7, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Spenót (nyers)', 'calories' => 23, 'protein' => 2.9, 'carb' => 3.6, 'fat' => 0.4, 'fiber' => 2.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Vöröshagyma (1 közepes ~80g)', 'calories' => 40, 'protein' => 1.1, 'carb' => 9.3, 'fat' => 0.1, 'fiber' => 1.7, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Fokhagyma (1 gerezd ~5g)', 'calories' => 149, 'protein' => 6.4, 'carb' => 33.0, 'fat' => 0.5, 'fiber' => 2.1, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'TV Paprika (1 db ~120g)', 'calories' => 20, 'protein' => 1.2, 'carb' => 3.0, 'fat' => 0.3, 'fiber' => 1.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kaliforniai paprika (1 db ~200g)', 'calories' => 31, 'protein' => 1.0, 'carb' => 6.0, 'fat' => 0.3, 'fiber' => 2.1, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Cukkini (1 db ~250g)', 'calories' => 17, 'protein' => 1.2, 'carb' => 3.1, 'fat' => 0.3, 'fiber' => 1.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Jégsaláta (1 fej ~500g)', 'calories' => 14, 'protein' => 0.9, 'carb' => 3.0, 'fat' => 0.1, 'fiber' => 1.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Szőlő (1 fürt ~200g)', 'calories' => 67, 'protein' => 0.6, 'carb' => 17.0, 'fat' => 0.4, 'fiber' => 0.9, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Körte (1 közepes ~180g)', 'calories' => 57, 'protein' => 0.4, 'carb' => 15.0, 'fat' => 0.1, 'fiber' => 3.1, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kivi (1 db ~70g)', 'calories' => 61, 'protein' => 1.1, 'carb' => 15.0, 'fat' => 0.5, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Citrom (1 db ~100g)', 'calories' => 29, 'protein' => 1.1, 'carb' => 9.0, 'fat' => 0.3, 'fiber' => 2.8, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Görögdinnye (1 szelet ~300g)', 'calories' => 30, 'protein' => 0.6, 'carb' => 7.6, 'fat' => 0.2, 'fiber' => 0.4, 'created_at' => now(), 'updated_at' => now()],

                    // McDonald's (Adagok súlya grammban)
                    ['foodname' => 'McDonalds - Big Mac (1db 215g)', 'calories' => 503, 'protein' => 26.0, 'carb' => 42.0, 'fat' => 25.0, 'fiber' => 3.1, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - Sajtburger (1db 115g)', 'calories' => 300, 'protein' => 16.0, 'carb' => 30.0, 'fat' => 12.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - McChicken (1db 170g)', 'calories' => 445, 'protein' => 21.0, 'carb' => 41.0, 'fat' => 22.0, 'fiber' => 2.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - McFarm (1db 165g)', 'calories' => 434, 'protein' => 21.0, 'carb' => 30.0, 'fat' => 25.0, 'fiber' => 2.4, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - McNuggets (6 db - 105g)', 'calories' => 250, 'protein' => 15.0, 'carb' => 15.0, 'fat' => 14.0, 'fiber' => 1.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - Sült krumpli (Kicsi - 75g)', 'calories' => 231, 'protein' => 2.4, 'carb' => 29.0, 'fat' => 11.0, 'fiber' => 2.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - Sült krumpli (Közepes - 115g)', 'calories' => 334, 'protein' => 3.5, 'carb' => 42.0, 'fat' => 16.0, 'fiber' => 3.6, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'McDonalds - Sült krumpli (Nagy - 150g)', 'calories' => 434, 'protein' => 4.5, 'carb' => 54.0, 'fat' => 21.0, 'fiber' => 4.7, 'created_at' => now(), 'updated_at' => now()],

                    // KFC (Adagok súlya grammban)
                    ['foodname' => 'KFC - Zinger szendvics (1db 175g)', 'calories' => 445, 'protein' => 22.0, 'carb' => 35.0, 'fat' => 24.0, 'fiber' => 2.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'KFC - Twister (1db 215g)', 'calories' => 485, 'protein' => 19.0, 'carb' => 48.0, 'fat' => 24.0, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'KFC - Hot Wings (5 db - 135g)', 'calories' => 450, 'protein' => 28.0, 'carb' => 12.0, 'fat' => 32.0, 'fiber' => 1.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'KFC - Qurrito (1db 220g)', 'calories' => 620, 'protein' => 34.0, 'carb' => 48.0, 'fat' => 32.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'KFC - Panírozott csirkemell csík (3 db - 90g)', 'calories' => 245, 'protein' => 21.0, 'carb' => 9.0, 'fat' => 14.0, 'fiber' => 0.8, 'created_at' => now(), 'updated_at' => now()],

                    // Burger King (Adagok súlya grammban)
                    ['foodname' => 'Burger King - Whopper (1db 270g)', 'calories' => 640, 'protein' => 28.0, 'carb' => 49.0, 'fat' => 37.0, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Burger King - Steakhouse Burger (1db 320g)', 'calories' => 790, 'protein' => 35.0, 'carb' => 52.0, 'fat' => 49.0, 'fiber' => 4.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Burger King - Chili Cheese Nuggets (6 db - 100g)', 'calories' => 230, 'protein' => 8.0, 'carb' => 19.0, 'fat' => 13.0, 'fiber' => 1.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Burger King - Bacon King (1db szimpla - 250g)', 'calories' => 900, 'protein' => 48.0, 'carb' => 45.0, 'fat' => 60.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Burger King - Hagymakarika (9 db - 120g)', 'calories' => 320, 'protein' => 3.0, 'carb' => 40.0, 'fat' => 16.0, 'fiber' => 2.5, 'created_at' => now(), 'updated_at' => now()],
                    
                    // Cukros Üdítők (100ml = ~42-50 kcal)
                    ['foodname' => 'Coca-Cola (100ml)', 'calories' => 42.0, 'protein' => 0.0, 'carb' => 10.6, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pepsi (100ml)', 'calories' => 43.0, 'protein' => 0.0, 'carb' => 11.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Fanta Narancs (100ml)', 'calories' => 48.0, 'protein' => 0.0, 'carb' => 12.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sprite (100ml)', 'calories' => 40.0, 'protein' => 0.0, 'carb' => 10.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kinley Tonic (100ml)', 'calories' => 37.0, 'protein' => 0.0, 'carb' => 9.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Energiaitalok (100ml-re vetítve!)
                    ['foodname' => 'Red Bull (100ml)', 'calories' => 45.0, 'protein' => 0.0, 'carb' => 11.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Monster Energy (Original - Adag: 500ml)', 'calories' => 47.0, 'protein' => 0.0, 'carb' => 12.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Hell Classic (Adag: 250ml)', 'calories' => 46.0, 'protein' => 0.0, 'carb' => 11.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Zero / Kalóriamentes termékek
                    ['foodname' => 'Coca-Cola Zero (Adag: 500ml)', 'calories' => 0.3, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pepsi Max (Adag: 500ml)', 'calories' => 0.3, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sprite Zero (Adag: 500ml)', 'calories' => 1.0, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Monster Ultra (Fehér Zero - Adag: 500ml)', 'calories' => 2.0, 'protein' => 0.0, 'carb' => 0.9, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Hell Zero (Adag: 250ml)', 'calories' => 0.0, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Gyümölcslevek és Teák
                    ['foodname' => 'Almalé (100%-os)', 'calories' => 45.0, 'protein' => 0.1, 'carb' => 10.1, 'fat' => 0.1, 'fiber' => 0.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Narancslé (100%-os)', 'calories' => 47.0, 'protein' => 0.7, 'carb' => 10.4, 'fat' => 0.2, 'fiber' => 0.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pfanner Ice Tea (Citromos)', 'calories' => 28.0, 'protein' => 0.1, 'carb' => 6.8, 'fat' => 0.1, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Alkoholok (Veszélyes kalóriák!)
                    ['foodname' => 'Sör (Világos - 5%)', 'calories' => 43.0, 'protein' => 0.5, 'carb' => 3.5, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Bor (Száraz fehér)', 'calories' => 82.0, 'protein' => 0.1, 'carb' => 2.6, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pálinka / Vodka (40%)', 'calories' => 230.0, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Chipsek és Sós snackek (Átlag 500-540 kcal/100g)
                    ['foodname' => 'Burgonyachips (Sós - Adag: 70g)', 'calories' => 536, 'protein' => 6.0, 'carb' => 53.0, 'fat' => 35.0, 'fiber' => 4.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Hagymás-tejfölös chips (Adag: 70g)', 'calories' => 525, 'protein' => 6.2, 'carb' => 52.0, 'fat' => 33.0, 'fiber' => 3.8, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tortilla chips (Nacho - Adag: 100g)', 'calories' => 480, 'protein' => 7.0, 'carb' => 60.0, 'fat' => 24.0, 'fiber' => 5.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Ropi (Sós pálcika - Adag: 45g)', 'calories' => 385, 'protein' => 10.0, 'carb' => 75.0, 'fat' => 5.0, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Sós mogyoró (Pörkölt - Adag: 100g)', 'calories' => 610, 'protein' => 25.0, 'carb' => 12.0, 'fat' => 52.0, 'fiber' => 8.0, 'created_at' => now(), 'updated_at' => now()],

                    // Csokoládék és Szeletes snackek (Átlag 450-550 kcal/100g)
                    ['foodname' => 'Tejcsokoládé (Adag: 100g tábla)', 'calories' => 535, 'protein' => 7.5, 'carb' => 55.0, 'fat' => 30.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Étcsokoládé (70% kakaó - Adag: 100g)', 'calories' => 560, 'protein' => 8.0, 'carb' => 35.0, 'fat' => 42.0, 'fiber' => 10.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Snickers szelet (Adag: 50g)', 'calories' => 485, 'protein' => 8.5, 'carb' => 60.0, 'fat' => 23.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Mars szelet (Adag: 51g)', 'calories' => 448, 'protein' => 4.0, 'carb' => 70.0, 'fat' => 17.0, 'fiber' => 1.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Túró Rudi (Natúr - Adag: 30g)', 'calories' => 355, 'protein' => 9.0, 'carb' => 36.0, 'fat' => 19.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'KitKat szelet (Adag: 41.5g)', 'calories' => 518, 'protein' => 7.0, 'carb' => 59.0, 'fat' => 27.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],

                    // Gumicukrok és Édességek
                    ['foodname' => 'Haribo Goldbären (Gumicukor - Adag: 100g)', 'calories' => 343, 'protein' => 6.9, 'carb' => 77.0, 'fat' => 0.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Haribo Tropifrutti (Adag: 100g)', 'calories' => 349, 'protein' => 4.5, 'carb' => 82.0, 'fat' => 0.5, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pillecukor (Marshmallow - Adag: 100g)', 'calories' => 320, 'protein' => 2.0, 'carb' => 78.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Popcorn és Mozis snackek
                    ['foodname' => 'Pattogatott kukorica (Sós - Adag: 100g)', 'calories' => 400, 'protein' => 12.0, 'carb' => 58.0, 'fat' => 14.0, 'fiber' => 13.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pattogatott kukorica (Vajas - Adag: 100g)', 'calories' => 480, 'protein' => 9.0, 'carb' => 50.0, 'fat' => 28.0, 'fiber' => 10.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Mozis Popcorn (Nagy adag - kb. 150g)', 'calories' => 510, 'protein' => 8.0, 'carb' => 55.0, 'fat' => 30.0, 'fiber' => 9.0, 'created_at' => now(), 'updated_at' => now()],

                    // Mogyoróvaj és Krémek (Nagyon magas kalória: ~600 kcal)
                    ['foodname' => 'Mogyoróvaj (Natúr/Crunchy - 100g)', 'calories' => 588, 'protein' => 25.0, 'carb' => 20.0, 'fat' => 50.0, 'fiber' => 6.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Nutella (Mogyorókrém - 100g)', 'calories' => 539, 'protein' => 6.3, 'carb' => 57.5, 'fat' => 30.9, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    
                    // Mogyorós Csokoládék és Szeletek
                    ['foodname' => 'Ferrero Rocher (1 db = 12.5g)', 'calories' => 576, 'protein' => 8.2, 'carb' => 44.4, 'fat' => 42.7, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Reese\'s Mogyoróvajas kosárka (1 db = 13g)', 'calories' => 515, 'protein' => 10.5, 'carb' => 56.0, 'fat' => 29.5, 'fiber' => 3.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'M&M\'s (Mogyorós - Adag: 45g)', 'calories' => 511, 'protein' => 9.7, 'carb' => 58.7, 'fat' => 25.4, 'fiber' => 3.9, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Raffaello (1 db = 10g)', 'calories' => 628, 'protein' => 7.5, 'carb' => 38.3, 'fat' => 48.6, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Kinder Bueno (1 rúd = 21.5g)', 'calories' => 572, 'protein' => 8.6, 'carb' => 49.5, 'fat' => 37.3, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Olajos magvak (Sótlan/Pörkölt - 100g)
                    ['foodname' => 'Kesudió (Pörkölt - 100g)', 'calories' => 553, 'protein' => 18.2, 'carb' => 30.2, 'fat' => 43.8, 'fiber' => 3.3, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Mandula (Natúr - 100g)', 'calories' => 579, 'protein' => 21.2, 'carb' => 21.7, 'fat' => 49.9, 'fiber' => 12.5, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Pisztácia (Héj nélkül - 100g)', 'calories' => 562, 'protein' => 20.2, 'carb' => 27.5, 'fat' => 45.3, 'fiber' => 10.6, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Dió (Tisztított - 100g)', 'calories' => 654, 'protein' => 15.2, 'carb' => 13.7, 'fat' => 65.2, 'fiber' => 6.7, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tökmag (Pörkölt - 100g)', 'calories' => 559, 'protein' => 30.2, 'carb' => 10.7, 'fat' => 49.1, 'fiber' => 6.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Napraforgómag (Szotyi - 100g)', 'calories' => 584, 'protein' => 20.8, 'carb' => 20.0, 'fat' => 51.5, 'fiber' => 8.6, 'created_at' => now(), 'updated_at' => now()],

                    // Sós mogyorós snackek
                    ['foodname' => 'Mogyorós Snak (Kukoricakukac - 100g)', 'calories' => 495, 'protein' => 13.0, 'carb' => 52.0, 'fat' => 25.0, 'fiber' => 4.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Bundázott mogyoró (Chilis/BBQ - 100g)', 'calories' => 520, 'protein' => 15.0, 'carb' => 38.0, 'fat' => 34.0, 'fiber' => 5.0, 'created_at' => now(), 'updated_at' => now()],

                    // Pékáruk (Alapvető szénhidrátforrások - 100g)
                    ['foodname' => 'Fehér kenyér (1 szelet ~50g)', 'calories' => 265, 'protein' => 9.0, 'carb' => 49.0, 'fat' => 3.2, 'fiber' => 2.7, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Teljes kiőrlésű kenyér (1 szelet ~50g)', 'calories' => 247, 'protein' => 13.0, 'carb' => 41.0, 'fat' => 3.4, 'fiber' => 7.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Vizes (1 db ~45g)', 'calories' => 272, 'protein' => 9.0, 'carb' => 53.0, 'fat' => 2.5, 'fiber' => 2.2, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Zsemle (1 db ~50g)', 'calories' => 280, 'protein' => 8.5, 'carb' => 57.0, 'fat' => 1.2, 'fiber' => 2.4, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Tortilla lap (Adag: 1db ~60g)', 'calories' => 312, 'protein' => 9.1, 'carb' => 50.0, 'fat' => 8.0, 'fiber' => 2.0, 'created_at' => now(), 'updated_at' => now()],

                    // Sütéshez, főzéshez és kenéshez (100g)
                    ['foodname' => 'Étóolaj (Napraforgó)', 'calories' => 884, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 99.8, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Vaj (82% zsírtartalom)', 'calories' => 717, 'protein' => 0.8, 'carb' => 0.1, 'fat' => 81.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Margarin', 'calories' => 360, 'protein' => 0.2, 'carb' => 0.5, 'fat' => 40.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Olívaolaj', 'calories' => 884, 'protein' => 0.0, 'carb' => 0.0, 'fat' => 99.8, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Szószok és Ízesítők (Egy evőkanál ~15-20g)
                    ['foodname' => 'Ketchup (1 evőkanál ~15g)', 'calories' => 112, 'protein' => 1.2, 'carb' => 25.0, 'fat' => 0.1, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Mustár (1 evőkanál ~15g)', 'calories' => 66, 'protein' => 4.4, 'carb' => 5.0, 'fat' => 4.0, 'fiber' => 3.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Majonéz (1 evőkanál ~15g)', 'calories' => 680, 'protein' => 1.0, 'carb' => 3.0, 'fat' => 75.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],

                    // Édesítés (100g)
                    ['foodname' => 'Kristálycukor ', 'calories' => 387, 'protein' => 0.0, 'carb' => 100.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    ['foodname' => 'Méz', 'calories' => 304, 'protein' => 0.3, 'carb' => 82.0, 'fat' => 0.0, 'fiber' => 0.0, 'created_at' => now(), 'updated_at' => now()],
                    
                ]
            );
    }
}
