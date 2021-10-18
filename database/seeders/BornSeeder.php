<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BornSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
          for($a = 1; $a <= 3; $a++){
        
            DB::table('borns')->insert([
                'name' => $faker->name,
                'tanggal_lahir' => $faker->date,
                'familyCards_id' => $faker->randomDigitNot(0),
            ]);
        };
    }
}
