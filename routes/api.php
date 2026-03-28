<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::prefix('students')->group(function () {

    Route::get('/', [StudentController::class, 'index']);

    Route::post('/', [StudentController::class, 'store']);

    Route::get('/{id}', [StudentController::class, 'show']);

    Route::put('/{id}', [StudentController::class, 'update']);

    Route::delete('/{id}', [StudentController::class, 'destroy']);

});