<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* $this->call(tusuarioSeeder::class);
        $this->call(setorSeeder::class);
        $this->call(ttecnicoSeeder::class);
        $this->call(problemaSeeder::class);
        $this->call(chamadoSeeder::class);*/
        $this->call(corSeeder::class);
        $this->call(situacaoSeeder::class);
        $this->call(alteracaoSeeder::class);
    }
}
