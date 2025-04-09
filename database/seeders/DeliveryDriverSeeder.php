<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\DeliveryDriver;

class DeliveryDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,3) as $index) {
            DeliveryDriver::create([
                'name' => $faker->name,
                'contact' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
