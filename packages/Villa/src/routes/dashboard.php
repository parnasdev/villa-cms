<?php

use Illuminate\Support\Facades\Route;
Route::prefix('villa')->name('villa.')->group(function () {
    Route::get('/reserves', \Packages\Villa\src\Http\Livewire\Dashboard\Reserves::class)->name('reserves');
});
