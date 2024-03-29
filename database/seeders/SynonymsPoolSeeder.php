<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SynonymsPoolSeeder extends Seeder
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
        DB::table('synonyms_pools')->insert([
            [
                'meaning' => 'Adj : large, great',
                'synonyms' => '["big", "colossal", "fat", "considerable", "full", "huge"]'
            ],
            [
                'meaning' => 'Adj : important',
                'synonyms' => '["big", "considerable", "leading", "main"]'
            ]
        ]);
    }
}
