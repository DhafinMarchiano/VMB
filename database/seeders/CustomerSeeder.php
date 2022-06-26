<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'company' => $faker->company,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'image' => $faker->imageUrl(640, 480, 'people'),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
