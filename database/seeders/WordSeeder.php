<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the words table seeds.
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert(
            [
                'word' => 'big',
                'synonyms_pools_id' => 1,
            ],
            [
                'word' => 'big',
                'synonyms_pools_id' => 2,
            ]
        );
    }
}
