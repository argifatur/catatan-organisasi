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
        /* ------------------------- Jadwal Pelajaran Pages ------------------------- */
        // Route::get('/jadwal-rapat', 'App\Http\Controllers\JadwalRapatController@index')->name('jadwal-rapat');
        // Route::get('/jadwal-rapat/atur-jadwal', 'App\Http\Controllers\JadwalRapatController@create')->name('atur-jadwal');
        Route::resource('jadwal-rapat', 'App\Http\Controllers\JadwalRapatController');
        /* ------------------------- Catatan Pelajaran Pages ------------------------ */
        Route::resource('catatan-kegiatan', 'App\Http\Controllers\NoteController');
        /* ---------------------------- Galeri Foto Pages --------------------------- */
        Route::get('/galeri-foto', 'App\Http\Controllers\GalleryController@index');
        Route::get('/galeri-foto/tambah-foto', 'App\Http\Controllers\GalleryController@create');
        Route::resource('galleries', 'App\Http\Controllers\GalleryController');
        /* ----------------------------- Bookmarks Pages ---------------------------- */
        Route::get('/bookmarks', 'App\Http\Controllers\BookmarkController@index');
        Route::get('/bookmarks/tambah-bookmarks', 'App\Http\Controllers\BookmarkController@create');
        Route::resource('bookmarks', 'App\Http\Controllers\BookmarkController');
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
        });
        Route::get('/journal', function () {
            return view('pages.backend.journal.index');
        });
        Route::get('/e-book', function () {
            return view('pages.backend.journal.e-book');
        });
    });

/* -------------------------------------------------------------------------- */
/*                         Laravel File Manager Routes                        */
/* -------------------------------------------------------------------------- */

/* -------------------- Laravel File Manager Main Routes -------------------- */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



require __DIR__ . '/auth.php';
