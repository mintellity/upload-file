<?php

use Illuminate\Support\Facades\Route;

use Mintellity\UploadFile\Http\Controllers\UploadFileController;

Route::controller(UploadFileController::class)->prefix('uploadFile')->as('uploadFile.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/destroy/{file}', 'destroy')->name('destroy');
});
