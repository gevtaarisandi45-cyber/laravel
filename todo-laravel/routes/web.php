<?php
use App\Http\Controllers\TugasController;

Route::get('/', function(){ return redirect()->route('tugas.index'); });

Route::resource('tugas', TugasController::class);

// route untuk menandai selesai (POST atau PATCH)
Route::post('tugas/{tugas}/selesai', [TugasController::class, 'selesai'])->name('tugas.selesai');
