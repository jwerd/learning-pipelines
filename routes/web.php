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
                new \App\Pipelines\AddTreatForPet([
                    'Bones',
                    'Peanut Butter',
                    'Garbage',
                ]),
                new \App\Pipelines\AddPetsPipeline([
                    'type' => 'Cat',
                    'name' => 'Luna'
                ]),
                new \App\Pipelines\AddTreatForPet([
                    'Cat Food'
                ]),
                new \App\Pipelines\AddPetsPipeline([
                    'type' => 'Cat',
                    'name' => 'Bear'
                ]),
                new \App\Pipelines\AddTreatForPet([
                    '9lives',
                    'Tuna',
                ]),
                new \App\Pipelines\EndOfPipeline(),
            ])
            ->thenReturn();
    return response()->json($pets,200);
    //dd($pets, $pets->treats);
});
