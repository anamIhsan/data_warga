<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
          for($a = 1; $a <= 10; $a++){
        
            DB::table('residents')->insert([
                'nik' => $faker->nik,
                'name' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'desa' => $faker->streetAddress,
                'rt' => $faker->randomDigit,
                'rw' => $faker->randomDigit,
                'pekerjaan' => $faker->jobTitle,
            ]);
        };
    }
}
