<?php

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $pet = App\Models\Pet::query();
    $pets = app(Pipeline::class)
            ->send($pet)
            ->through([
                new \App\Pipelines\AddPetsPipeline([
                    'type' => 'Dog',
                    'name' => 'Rosie'
                ]),
                new \App\Pipelines\AddPetsPipeline([
                    'type' => 'Cat',
                    'name' => 'Luna'
                ]),
                new \App\Pipelines\AddPetsPipeline([
                    'type' => 'Cat',
                    'name' => 'Bear'
                ]),
            ])
            ->thenReturn()
            ->get();
    dd($pets);
    dump('all done');
});
