<?php
use Illuminate\Support\Facades\{Route, Artisan};

use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\CommentController;
use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Public\PublicationsController;
use App\Http\Controllers\Public\RegisterController;
use App\Http\Controllers\Public\ShowPublicationsController;

//Route::get('/', [BlogController::class, 'welcome_index'])->name('public.welcome.index');
Route::group(['prefix' => 'inicio'], function () {

    Route::get('publicaciones', [PublicationsController::class, 'show'])->name('public.publications.show');
    Route::get('publicaciones/{post}', [ShowPublicationsController::class, 'show'])->name('public.showpublications.show');
    Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('public.categorypublications.show');
    Route::resource('publicaciones/comment', CommentController::class)->except(['index', 'show', 'edit'])->names('public.comment');

    Route::get('iniciar', [LoginController::class, 'index'])->name('public.login.index');
    Route::post('iniciar', [LoginController::class, 'store'])->name('public.login.store');
    Route::get('cerrar', [LoginController::class, 'logout'])->name('public.logout');
    Route::get('crear', [RegisterController::class, 'index'])->name('public.register.index');
    Route::post('crear', [RegisterController::class, 'store'])->name('public.register.store');
});


Route::get('/clear', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('view:clear');
    $run = Artisan::call('route:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('optimize');
    return 'Limpieza del Sistema Terminada con exito';
});
Route::get('/local', function(){
    Artisan::call('storage:link');
    return 'La carpeta storage sea creado con exito';
});

Route::get('/server', function(){

    if (file_exists(public_path('storage'))) {
        return "La carpeta Storage ya existe";
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );
    return 'La carpeta storage sea creado con exito.';
});

