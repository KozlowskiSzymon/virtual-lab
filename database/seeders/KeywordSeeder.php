<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->insert([
            'id' => '1',
            'name' => 'oscilloscope',
        ]);
        DB::table('keywords')->insert([
            'id' => '2',
            'name' => 'apple',
        ]);
        DB::table('keywords')->insert([
            'id' => '3',
            'name' => 'laptop',
        ]);
        DB::table('keywords')->insert([
            'id' => '4',
            'name' => 'measurements',
        ]);
        DB::table('keywords')->insert([
            'id' => '5',
            'name' => 'programming',
        ]);
    }
}
