<?php

use App\Models\tproblema;
use Illuminate\Database\Seeder;

class problemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tproblema::class, 30)->create();
        //
    }
}
