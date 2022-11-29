<?php

namespace Database\Seeders;

use App\Models\Company;
use Faker\Factory as Faker;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
        ]);

        $faker = Faker::create('id_ID');
        $data = [];

        for ($i = 0; $i < 20000; $i++) {
            $data[] = [
                'name' => $faker->name(),
                'id_company' => Company::get()->random()->id,
                'address' => $faker->address(),
                'email' => $faker->unique()->email(),
                'no_tlp' => $faker->phoneNumber(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 2000);

        foreach ($chunks as $chunk) {
            Employee::insert($chunk);
        }
    }
}