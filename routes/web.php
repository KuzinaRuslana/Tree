<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tree', [TreeController::class, 'getTreeStructure'])->name('tree.index');
Route::get('/tree/flat', [TreeController::class, 'getFlatList'])->name('tree.flat');
