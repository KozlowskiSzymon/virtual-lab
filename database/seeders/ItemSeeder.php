<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'id' => '1',
            'name' => 'Macbook',
            'model' => 'Pro A1',
            'image' => 'data:image/jpeg;base64,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',
            'description' => 'New macbook, 8 Gb RAM, 512 Gb SSh, grey.',
            'url' => 'https://www.apple.com/pl-edu/shop/buy-mac/macbook-pro/13-calowy-gwiezdna-szaro%C5%9B%C4%87-czip-apple-m1-z-8-rdzeniowym-cpu-i-8-rdzeniowym-gpu-256gb#',
            'quantity' => 2,
            'available' => 2,
        ]);
        DB::table('items')->insert([
            'id' => '2',
            'name' => 'Macbook',
            'model' => 'Air 13,3"',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYGpW3iKIEjePrsZiC8_mIAY36mUOswW70pg&usqp=CAU',
            'description' => 'Ekran: 13,3 cala, 2560 x 1600 pikseli. Procesor: Intel Core i5 8gen 2,4 - 4,1 GHz. Pamięć: 16 GB LPDDR3 RAM. Dysk: 512 GB SSD. Grafika: Intel Iris Plus Graphics 655. System operacyjny: Mac OS Mojave',
            'url' => 'https://www.euro.com.pl/laptopy-i-netbooki/apple-macbook-12-intel-core-m3-8gb-ram-256gb-dysk-osx-sierra_1.bhtml',
            'quantity' => 3,
            'available' => 3,
        ]);
        DB::table('items')->insert([
            'id' => '3',
            'name' => 'Macbook',
            'model' => 'Air M1',
            'image' => 'https://f01.esfr.pl/foto/8/74215255585/79c342bb6c51c3bdec99266a26137bee/apple-laptop-macbook-air-13-m1-8gb-256ssd,74215255585_8.jpg',
            'description' => 'New macbook, 8 Gb RAM, 256 Gb SSh, grey',
            'url' => 'https://www.euro.com.pl/laptopy-i-netbooki/apple-laptop-macbook-air-13-m1-8gb-256ssd.bhtml',
            'quantity' => 2,
            'available' => 2,
        ]);
        DB::table('items')->insert([
            'id' => '4',
            'name' => 'Macbook',
            'model' => 'Pro 13"',
            'image' => 'https://f00.esfr.pl/foto/8/45550042857/c5ff555215356ddb55f8e95019583350/apple-laptop-mb-pro-13-tb-i5-8gb-512ssd-silver,45550042857_8.jpg',
            'description' => 'Ekran: 13,3 cala, 2560 x 1600 pikseli. Procesor: Intel Core i5 8gen 2,4 - 4,1 GHz. Pamięć: 8 GB LPDDR3 RAM. Dysk: 512 GB SSD. Grafika: Intel Iris Plus Graphics 655. System operacyjny: Mac OS Mojave',
            'url' => 'https://www.euro.com.pl/laptopy-i-netbooki/apple-laptop-mb-pro-13-tb-i5-8gb-512ssd-silver.bhtml',
            'quantity' => 5,
            'available' => 5,
        ]);
        DB::table('items')->insert([
            'id' => '5',
            'name' => 'Oscilloscope',
            'model' => 'MSO2008W',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-rziBGWYgvrxqCePB8tYQ2PGzvn_tHQO4lA&usqp=CAU',
            'description' => '8 channels, sample rate 2 Ghz, memory 2Gb',
            'url' => 'https://www.acute.com.tw/logic-analyzer-en/product/mso/mso2000?gclid=CjwKCAjwkvWKBhB4EiwA-GHjFljNp65Bu0xmAxYImu1mV3JHgIa6XDT1MFh0Lzac1OA1MTFv4ZaUwRoC11oQAvD_BwE',
            'quantity' => 4,
            'available' => 4,
        ]);
    }
}
