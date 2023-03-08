<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    $count = 1000;
//    while ($count > 0) {
//        /** @var \Faker\Generator $faker */
//        $faker = app()->make(\Faker\Generator::class);
//
//        $user = new \App\Models\User();
//        $user->name = $faker->name;
//        $user->email = $faker->email;
//        $user->password = \Illuminate\Support\Facades\Hash::make($faker->password);
//
//        $user->save();
//        $count--;
//    }

    $begin = microtime(true);
    \App\Models\User::query()
        ->get()
        ->each(function (\App\Models\User $user) {});
    $end = microtime(true) - $begin;


    $query = \App\Models\User::query();
    echo sprintf('count=%d, time=%.2fs', $query->count(), $end);

});
