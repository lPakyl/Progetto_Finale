<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PublicController::class,'homepage'])->name('homepage');
Route::get('/category/{category}',[PublicController::class,'show'])->name('categoryShow');

Route::get('/Announcement/create',[AnnouncementController::class, 'create'])->middleware('auth')->name('announcement.create');
Route::get('/Announcement/show/{announcement}',[AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/Announcement/index',[AnnouncementController::class,'index'])->name('announcement.index');


Route::get('/profile',[UserController::class,'profile'])->middleware('auth')->name('user.profile');
Route::get('/Announcement/show/profile/{announcement}', [AnnouncementController::class, 'showProfile'])->name('announcement.profile');
Route::delete('/Announcement/destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');



// rotte revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::patch('/rollback-transaction', [RevisorController::class, 'rollbackTransaction'])->name('revisor.rollbackTransaction');

// Richiedi di diventare revisore 
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// Rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//rotte search

Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');

Route::post('/lingua{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

Route::get('/aboutus',[PublicController::class,'about'])->name('about');



Route::put('/announcements/like/{announcement}', [PublicController::class, 'like'])->name('like');
Route::get('/profile/like',[UserController::class,'like'])->middleware('auth')->name('user.like');

