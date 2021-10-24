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
            'name' => 'oscilloscope',
        ]);
        DB::table('keywords')->insert([
            'name' => 'apple',
        ]);
        DB::table('keywords')->insert([
            'name' => 'laptop',
        ]);
        DB::table('keywords')->insert([
            'name' => 'measurements',
        ]);
        DB::table('keywords')->insert([
            'name' => 'programming',
        ]);
    }
}
