<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD para categorías
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', \App\Livewire\Dashboard\Category\Index::class)->name('d-category-index'); // Listado
        Route::get('/create', \App\Livewire\Dashboard\Category\Save::class)->name('d-category-create'); // Formulario de creación
        Route::get('/edit/{id}', \App\Livewire\Dashboard\Category\Save::class)->name('d-category-edit'); // Formulario de edición


    });

    // CRUD para etiquetas
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', \App\Livewire\Dashboard\Tag\Index::class)->name('d-tag-index'); // Listado
        Route::get('/create', \App\Livewire\Dashboard\Tag\Save::class)->name('d-tag-create'); // Formulario de creación
        Route::get('/edit/{id}', \App\Livewire\Dashboard\Tag\Save::class)->name('d-tag-edit'); // Formulario de edición
    });

    // CRUD para publicaciones
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', \App\Livewire\Dashboard\Post\Index::class)->name('d-post-index'); // Listado
        Route::get('/create', \App\Livewire\Dashboard\Post\Save::class)->name('d-post-create'); // Formulario de creación
        Route::get('/edit/{id}', \App\Livewire\Dashboard\Post\Save::class)->name('d-post-edit'); // Formulario de edición
    });
});


