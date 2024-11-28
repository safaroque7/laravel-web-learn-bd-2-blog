<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

Route::get('/', function () {
    return view('frontend.pages.index');
});


Route::get('/', [FrontendController::class, 'index'])->name('front.pages.index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [BackController::class, 'index'])->name('back.index');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
