<?php

use App\Models\tsetor;
use Illuminate\Database\Seeder;

class setorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tsetor::class, 30)->create();
        //
    }
}
