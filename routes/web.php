<?php

use App\Http\Controllers\main;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LanguageController;



// Foreigner
    Route::get('/',[main::class,'home'])->name('home');
    Route::get('/ads/Index',[main::class,'ads'])->name('ads.index');
    Route::get('/category/{id}/index',[main::class,'adsByCategory'])->name('adsByCategory');
    Route::get('/ad/{id}/detail',[main::class,'adDetail'])->name('adDetail');

    //dashboard
        Route::get('/announcement-dashboard',[GuestController::class,'dashboard'])->name('dashboard');



// Guest
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/lavora-con-noi',[GuestController::class,'lavoraConNoi'])->name('lavora-con-noi');
        Route::get('/diventa-revisore/{user}',[GuestController::class,'beChecker'])->name('beChecker');
        Route::post('/candidati',[GuestController::class,'candidati'])->name('candidati');
        //Likes
        Route::get('setLike/{id}',[GuestController::class,'adLike'])->name('adLike');
        Route::get('removeLike/{id}',[GuestController::class,'removeLike'])->name('removeLike');
        //Profilo
        Route::get('/profilo',[main::class,'profilo'])->name('profilo');
        //Edit
        Route::get('/ad/{id}/edit',[main::class,'adEdit'])->name('adEdit');
    });

// Revisore
    Route::middleware(['checker'])->group(function () {
        Route::get('/ad-revision',[main::class,'goToCheck'])->name('adRevision')->middleware('checker');
        Route::get('/accept/{id}',[main::class,'acceptAd'])->name('acceptAd');
        Route::get('/refuse/{id}',[main::class,'refuseAd'])->name('refuseAd');
        Route::get('/undo',[main::class,'unDo'])->name('unDo');
    });

// Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/makeChecker/{user}',[AdminController::class,'makeChecker'])->name('makeChecker');
    });

// lingua
    Route::post('lingua/{lang}',[main::class,'setLanguage'])->name('lingua');

