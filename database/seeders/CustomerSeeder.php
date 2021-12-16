<?php

namespace Database\Seeders;

use App\Models\Customers;
use Faker\Factory;
use Illuminate\Database\Seeder;
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
        $dataPalsu = Factory::create('id_ID');
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'email' => $dataPalsu->email(),
                'first_name' => $dataPalsu->firstName(),
                'last_name' => $dataPalsu->lastName(),
                'city' => $dataPalsu->city(),
                'address' => $dataPalsu->address(),
                'password' => Hash::make('1234567'),
            ];
        }

        (new Customers())->newQuery()->insert($data);
    }
}
