<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransformController;

Route::get('/', [TransformController::class,'index'])
    ->name('transform.index');

Route::post('/process', [TransformController::class,'process'])
    ->name('transform.process');