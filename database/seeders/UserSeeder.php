<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert user
        $userId = DB::table('users')->insertGetId([
            'first_name'        => 'Manacouture',
            'last_name'         => 'India',
            'username'          => 'manacoutureindia',
            'email'             => 'manacoutureindia@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('manacoutureindia'),
            'remember_token'    => null,

            'avatar_id'         => null,
            'super_user'        => 1,
            'manage_supers'     => 1,
            'permissions'       => null,
            'last_login'        => null,

            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        // Insert activation record
        DB::table('activations')->insert([
            'user_id'      => $userId,
            'code'         => Str::random(40),
            'completed'    => 1,
            'completed_at' => Carbon::now(),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
