<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComeSeeder extends Seeder
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
        
            DB::table('comes')->insert([
                'nik' => $faker->nik,
                'name' => $faker->name,
                'tanggal_datang' => $faker->date,
                'pelapor' => $faker->randomDigitNot(0),
            ]);
        };
    }
}
