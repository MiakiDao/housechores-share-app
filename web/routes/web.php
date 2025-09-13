<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;

Route::get('/', function () {
    return view('top');
});

Route::get('/assignment', [AssignmentController::class, 'index']);
