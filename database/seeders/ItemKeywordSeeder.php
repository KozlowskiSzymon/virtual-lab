<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_keyword')->insert([
            'item_id' => '1',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '1',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '1',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '2',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '2',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '2',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '3',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '3',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '3',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '4',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '4',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '4',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '5',
            'keyword_id' => '1',
        ]);
        DB::table('item_keyword')->insert([
            'item_id' => '5',
            'keyword_id' => '4',
        ]);

    }
}
