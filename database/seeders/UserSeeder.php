<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'James',
            'surname' => 'Bond',
            'email' => 'james.bond@gmail.com',
            'login' => 'james.bond',
            'password' => Hash::make('password'),
            'status' => Role::Admin
        ]);
        DB::table('users')->insert([
            'name' => 'John',
            'surname' => 'Wall',
            'email' => 'john.wall@gmail.com',
            'login' => 'john.wall',
            'password' => Hash::make('password'),
            'status' => Role::Admin
        ]);
        DB::table('users')->insert([
            'name' => 'Michael',
            'surname' => 'Jordan',
            'email' => 'michael.jordan@gmail.com',
            'login' => 'michael.jordan',
            'password' => Hash::make('password'),
            'status' => Role::User
        ]);
        DB::table('users')->insert([
            'name' => 'Kobe',
            'surname' => 'Bryant',
            'email' => 'kobe.bryant@gmail.com',
            'login' => 'kobe.bryant',
            'password' => Hash::make('password'),
            'status' => Role::User
        ]);
        DB::table('users')->insert([
            'name' => 'Anna',
            'surname' => 'Karenina',
            'email' => 'anna.karenina@gmail.com',
            'login' => 'anna.karenina',
            'password' => Hash::make('password'),
            'status' => Role::User
        ]);
    }
}
