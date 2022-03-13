<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
|
|
*/

use Illuminate\Support\Facades\Route;

Route::prefix('villa')->name('villa.')->group(function () {
    Route::get('/list', \Packages\Villa\src\Http\Livewire\Admin\ListPage::class)->name('list');
    Route::get('/add', \Packages\Villa\src\Http\Livewire\Admin\AddPage::class)->name('add');
    Route::get('/edit/{residence}',\Packages\Villa\src\Http\Livewire\Admin\EditPage::class)->name('edit');
});
