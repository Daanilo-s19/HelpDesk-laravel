<?php

use App\Models\tusuario;
use Illuminate\Database\Seeder;

class tusuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tusuario::class, 20)->create();
        //
    }
}
