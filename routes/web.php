<?php

use Illuminate\Support\Facades\Route;

/* -------------------------------------------------------------------------- */
/*                               Backend Routes                               */
/* -------------------------------------------------------------------------- */
Route::get('/', function () {
    return redirect('login');
});
Route::prefix('dashboard')->middleware(['auth'])
    ->group(function () {
        /* -------------------------- Dashboard Index Pages ------------------------- */
        Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
        Route::resource('jadwal-rapat', 'App\Http\Controllers\JadwalRapatController');
        Route::resource('admin', 'App\Http\Controllers\AdminController');
        Route::get('profil', 'App\Http\Controllers\AdminController@profil')->name('profil');
        Route::put('profil/update/{id}', 'App\Http\Controllers\AdminController@profilUpdate')->name('profil-update');
        /* ------------------------- Catatan Pelajaran Pages ------------------------ */
        Route::resource('catatan-kegiatan', 'App\Http\Controllers\NoteController');
        Route::resource('struktur-pengurus', 'App\Http\Controllers\StrukturController');
        /* ---------------------------- Galeri Foto Pages --------------------------- */
        Route::get('/galeri-foto', 'App\Http\Controllers\GalleryController@index');
        Route::get('/galeri-foto/tambah-foto', 'App\Http\Controllers\GalleryController@create');
        Route::resource('galleries', 'App\Http\Controllers\GalleryController');
        /* ---------------------------- File Tugas Pages ---------------------------- */
        Route::get('/file-tugas', function () {
            return view('pages.backend.files.index');
        });
        /* ----------------------------- Todolist Pages ----------------------------- */
        Route::get('/todolist', 'App\Http\Controllers\TodolistController@index');
        Route::resource('todolist', 'App\Http\Controllers\TodolistController');
        Route::get('todolist/delete/{id}', 'App\Http\Controllers\TodolistController@doneviadashboard')
            ->name('todolist.done');
        /* ----------------------------- Calendar Pages ----------------------------- */
        Route::get('/calendar', function () {
            return view('pages.backend.calendar.index');
        })->name('calendar');
    });

/* -------------------------------------------------------------------------- */
/*                         Laravel File Manager Routes                        */
/* -------------------------------------------------------------------------- */

/* -------------------- Laravel File Manager Main Routes -------------------- */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



require __DIR__ . '/auth.php';
