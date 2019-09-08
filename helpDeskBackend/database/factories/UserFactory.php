<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\talteracao;
use App\Models\tchamado;
use App\Models\tcor;
use App\Models\tprioridade;
use App\Models\tproblema;
use App\Models\tsetor;
use App\Models\tsituacao;
use App\Models\ttecnico;
use App\Models\tusuario;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(tsetor::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->numberBetween(80000000000, 99999999999),
        'email' =>  $faker->unique()->safeEmail,
    ];
});
$factory->define(tusuario::class, function (Faker $faker) {
    return [
        'cpf' => $faker->numberBetween(1000000000, 9999999999),
        'telefone' => $faker->numberBetween(80000000000, 99999999999),
        'email' =>  $faker->unique()->safeEmail,
    ];
});
$factory->define(ttecnico::class, function (Faker $faker) {
    return [
        'login' => $faker->userName,
        'nome' => $faker->name,
        'telefone' => $faker->numberBetween(80000000000, 99999999999),
        'email' =>  $faker->unique()->safeEmail,
        'id_setor' => tsetor::all()->random()->id,
        'cargo' => $faker->randomElement($array = array('a', 'g', 't')),
    ];
});
$factory->define(tproblema::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'id_setor' => tsetor::all()->random()->id,

    ];
});

$factory->define(tchamado::class, function (Faker $faker) {
    return [
        'data' => $faker->dateTime(),
        'ti' => $faker->numberBetween(0, 1),
        'descricao' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'tombo' => $faker->numberBetween(10000, 99999),
        'id_tecnico' => ttecnico::all()->random()->login,
        'id_usuario' => tusuario::all()->random()->cpf,
        'id_setor' => tsetor::all()->random()->id,

    ];
});
$factory->define(tcor::class, function (Faker $faker) {
    return [
        'hex' => $faker->hexcolor,

    ];
});

$factory->define(tsituacao::class, function (Faker $faker) {
    return [
        'nome' => $faker->randomElement($array = array('aberto', 'fechado', 'pendente', 'em aguardo')),
        'id_cor' => tcor::all()->random()->id,

    ];
});
$factory->define(talteracao::class, function (Faker $faker) {
    return [
        'data' => $faker->dateTime(),
        'descricao' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'id_tecnico' => ttecnico::all()->random()->login,
        'id_chamado' => tchamado::all()->random()->id,
        'id_situacao' => tsituacao::all()->random()->id,
        'id_prioridade' => tprioridade::all()->random()->id,


    ];
});
