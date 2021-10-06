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
            'name' => 'Macbook',
            'model' => 'Pro A1',
            'image' => '',
            'description' => 'New macbook, 8 Gb RAM, 512 Gb SSh, grey.',
            'url' => 'https://www.apple.com/pl-edu/shop/buy-mac/macbook-pro/13-calowy-gwiezdna-szaro%C5%9B%C4%87-czip-apple-m1-z-8-rdzeniowym-cpu-i-8-rdzeniowym-gpu-256gb#',
            'quantity' => 2,
            'keyWords' => 'laptop;computer;programming'
        ]);
        DB::table('items')->insert([
            'name' => 'Oscilloscope',
            'model' => 'MSO2008W',
            'image' => '',
            'description' => '8 channels, sample rate 2 Ghz, memory 2Gb',
            'url' => 'https://www.acute.com.tw/logic-analyzer-en/product/mso/mso2000?gclid=CjwKCAjwkvWKBhB4EiwA-GHjFljNp65Bu0xmAxYImu1mV3JHgIa6XDT1MFh0Lzac1OA1MTFv4ZaUwRoC11oQAvD_BwE',
            'quantity' => 4,
            'keyWords' => 'oscilloscope;mso;measurement'
        ]);
    }
}
