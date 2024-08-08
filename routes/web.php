<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index']);
Route::post('/pegawai', [EmployeeController::class, 'store']);

Route::get('/api/list-pegawai', [EmployeeController::class, 'listEmployees']);
