<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tree', [TreeController::class, 'getTreeStructure'])->name('tree.index');
Route::post('tree', [TreeController::class, 'store'])->name('tree.store');
Route::delete('tree', [TreeController::class, 'destroy'])->name('tree.destroy');
Route::get('tree/flat', [TreeController::class, 'getFlatList'])->name('tree.flat');
