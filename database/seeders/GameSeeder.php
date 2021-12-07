<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => 'BAMBOO RUSH',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/bamboo_rush.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=806&lang=es',
            'description'=>'description of BAMBOO RUSH',
            'status'=>false
        ]);
        DB::table('games')->insert([
            'name' => 'REELS OF WEALTH',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/reels_of_wealth.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=795&lang=es',
            'description'=>'description of REELS OF WEALTH',
            'status'=>true
        ]);
        DB::table('games')->insert([
            'name' => 'DRAGON & PHOENIX',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/dragon_phoenix.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=814&lang=es',
            'description'=>'description of DRAGON & PHOENIX',
            'status'=>true
        ]);
        DB::table('games')->insert([
            'name' => 'TAKE THE BANK',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/take_the_bank.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=813&lang=es',
            'description'=>'description of TAKE THE BANK',
            'status'=>false
        ]);
        DB::table('games')->insert([
            'name' => 'CAISHEN’S ARRIVAL',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/caishens_arrival.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=812&lang=es',
            'description'=>'description of CAISHEN’S ARRIVAL',
            'status'=>false
        ]);

        DB::table('games')->insert([
            'name' => 'GEMMED!',
            'urlImage' => 'https://winchiletragamonedas.com/public/images/games/gemmed.jpeg',
            'urlGame'=>'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=811&lang=es',
            'description'=>'description of GEMMED!',
            'status'=>true
        ]);
    }
}
