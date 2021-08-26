<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthTokenSeeder extends Seeder
{
    /**
     * Run the auth_tokens table seeds.
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_tokens')->insert([
            'token' => 'f9bf78b9a18ce6d46a0cd2b0b86df9da',
        ]);
    }
}
