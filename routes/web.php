<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'userProfile'])->middleware(['auth']);

Route::get('/editUser', [App\Http\Controllers\HomeController::class, 'userEdit'])->middleware(['auth']);

Route::post('/editUser', [App\Http\Controllers\HomeController::class, 'userEditing'])->middleware(['auth']);

Route::get('/tickets', [\App\Http\Controllers\MPController::class, 'tickets'])->middleware(['auth']);

Route::get('/payTickets', [\App\Http\Controllers\MPController::class, 'payTickets'])->middleware(['auth'])->name('payTickets');

Route::get('/tickets/success', [\App\Http\Controllers\MPController::class, 'success'])
->name('tickets.success')->middleware(['auth']);

Route::get('/tickets/failure', [\App\Http\Controllers\MPController::class, 'failure'])
->name('tickets.failure')->middleware(['auth']);

Route::get('/tickets/pending', [\App\Http\Controllers\MPController::class, 'pending'])
->name('tickets.pending')->middleware(['auth']);

Route::get('/noticias', [App\Http\Controllers\HomeController::class, 'noticias']);

Route::get('/logIn', [App\Http\Controllers\AutenticacionController::class, 'logIn']);

Route::post('/logIn', [App\Http\Controllers\AutenticacionController::class, 'logIning']);

Route::get('/register', [App\Http\Controllers\AutenticacionController::class, 'register']);

Route::post('/register', [App\Http\Controllers\AutenticacionController::class, 'registering']);

Route::post('/logOut', [App\Http\Controllers\AutenticacionController::class, 'logOuting']);

Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->middleware(['auth','auth.admin']);

Route::get('/admin/noticias', [\App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth','auth.admin']);

Route::get('/admin/usuarios', [\App\Http\Controllers\AdminController::class, 'users'])->middleware(['auth','auth.admin']);

Route::get('/admin/usuarios/{id}', [\App\Http\Controllers\AdminController::class, 'users_details'])->middleware(['auth','auth.admin']);

Route::get('/admin/noticias/{id}', [\App\Http\Controllers\AdminController::class, 'details'])->whereNumber('id')
->middleware(['auth','auth.admin']);

Route::get('/admin/noticias/crear', [\App\Http\Controllers\AdminController::class, 'create'])->middleware(['auth','auth.admin']);

Route::post('/admin/noticias/crear', [\App\Http\Controllers\AdminController::class, 'creating'])->middleware(['auth','auth.admin']);

Route::get('/admin/noticias/{id}/editar', [\App\Http\Controllers\AdminController::class, 'edit'])->whereNumber('id')
->middleware(['auth','auth.admin']);

Route::post('/admin/noticias/{id}/editar', [\App\Http\Controllers\AdminController::class, 'editing'])->whereNumber('id')
->middleware(['auth','auth.admin']);

Route::get('/admin/noticias/{id}/eliminar', [\App\Http\Controllers\AdminController::class, 'delete'])->whereNumber('id')
->middleware(['auth','auth.admin']);

Route::post('/admin/noticias/{id}/eliminar', [\App\Http\Controllers\AdminController::class, 'deleting'])->whereNumber('id')
->middleware(['auth','auth.admin']);
