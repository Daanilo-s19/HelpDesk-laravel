<?php

use App\Models\tcor;
use Illuminate\Database\Seeder;

class corSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(tcor::class, 10)->create();
        //
    }
}
