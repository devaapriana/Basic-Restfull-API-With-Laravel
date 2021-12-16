<?php

namespace Database\Seeders;

use App\Models\Products;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create('id_ID');

        $categories = ['Pakaian', 'Gadget', 'Digital'];
        $titles = [
            'Pakaian' => [
                'material' => ['Kaos', 'Kemeja', 'Celana', 'Jas'],
                'jenis' => ['Besar', 'Kecil', 'Anak', 'Laki-Laki', 'Perempuan'],
                'warna' => ['putih', 'merah', 'hijau', 'biru', 'kuning', 'pink', 'ungu', 'hitam'],
            ],
            'Gadget' => [
                'material' => ['HP', 'Table', 'Laptop', 'PC', 'Mini PC'],
                'jenis' => ['Samsung', 'Asus', 'Xiaomi', 'Dell', 'Acer', 'Polytron'],
                'warna' => ['Silver', 'Gold', 'Putih', 'Hitam']
            ],
            'Digital' => [
                'material' => ['Pulsa', 'Kouta', 'Perdana'],
                'jenis' => ['Telkomsel', 'Tri', '3', 'Axis', 'XL', 'Indosat Oredoo'],
                'warna' => ['100', '50', '20', '10', '5']
            ]
        ];

        for ($i = 1; $i <= 100; $i++) {
            $category = $fake->randomElement($categories);
            $titleStr = $fake->randomElement($titles[$category]['material']);
            $titleStr .= ' ' . $fake->randomElement($titles[$category]['jenis']);
            $titleStr .= ' ' . $fake->randomElement($titles[$category]['warna']);

            $data[] = [
                'category' => $category,
                'title' => $titleStr,
                'price' => $fake->numberBetween(1, 100) * 1000,
                'description' => $fake->text(),
                'stock' => $fake->numberBetween(1, 200),
                'free_shipping' => $fake->numberBetween(0, 1),
                'rate' => $fake->randomFloat(2, 1, 5)
            ];

            (new Products())->insert($data);
        }
    }
}
