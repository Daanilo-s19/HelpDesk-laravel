<?php

use App\Models\tsituacao;
use Illuminate\Database\Seeder;

class situacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tsituacao::class, 30)->create();

        //
    }
}
