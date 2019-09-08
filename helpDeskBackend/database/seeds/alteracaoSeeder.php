<?php

use App\Models\talteracao;
use Illuminate\Database\Seeder;

class alteracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(talteracao::class, 10)->create();
        //
    }
}
