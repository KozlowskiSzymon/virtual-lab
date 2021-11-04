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
            'id' => '1',
            'item_id' => '1',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '2',
            'item_id' => '1',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '3',
            'item_id' => '1',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '4',
            'item_id' => '2',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '5',
            'item_id' => '2',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '6',
            'item_id' => '2',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '7',
            'item_id' => '3',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '8',
            'item_id' => '3',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '9',
            'item_id' => '3',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '10',
            'item_id' => '4',
            'keyword_id' => '2',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '11',
            'item_id' => '4',
            'keyword_id' => '3',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '12',
            'item_id' => '4',
            'keyword_id' => '5',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '13',
            'item_id' => '5',
            'keyword_id' => '1',
        ]);
        DB::table('item_keyword')->insert([
            'id' => '14',
            'item_id' => '5',
            'keyword_id' => '4',
        ]);

    }
}
