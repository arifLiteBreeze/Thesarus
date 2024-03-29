<?php

namespace Database\Seeders;

use App\Models\AuthToken;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run all the table seeds.
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthTokenSeeder::class,
            SynonymsPoolSeeder::class,
            WordSeeder::class,
        ]);
    }
}
