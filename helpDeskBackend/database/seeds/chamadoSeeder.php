<?php

use App\Models\tchamado;
use Illuminate\Database\Seeder;

class chamadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tchamado::class, 10)->create();

        //
    }
}
