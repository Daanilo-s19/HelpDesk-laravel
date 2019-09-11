<?php

use App\Models\ttecnico;
use Illuminate\Database\Seeder;

class ttecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ttecnico::class, 30)->create();
        //
    }
}
