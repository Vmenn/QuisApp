<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'murid',
            'email' => 'murid@gmail.com',
            'role' => 'murid',
            'password' => bcrypt('123')
        ]);

        for ($i = 0; $i < 10; $i++) {
            $faker = Factory::create('id_ID');
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => bcrypt('123')
            ]);
        }
    }
}