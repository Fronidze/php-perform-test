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


    //$cache = \Illuminate\Support\Facades\Cache::get('test');
    $count = \Illuminate\Support\Facades\Cache::get('count');
    if ($count === null) {
        \App\Models\User::query()
            ->get()
            ->each(function (\App\Models\User $user) {});

        $count = \App\Models\User::query()->count();
        \Illuminate\Support\Facades\Cache::put('count', $count, now()->addSeconds(10));
    }
    echo sprintf('count=%d, time=%.2fs', $count, 22.032);

});
