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
                'synonyms' => 'colossal, fat, considerable, fat, full, huge'
            ],
            [
                'meaning' => 'Adj : important',
                'synonyms' => 'considerable, leading, main'
            ]
        ]);
    }
}
