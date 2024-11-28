<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

Route::get('/', function () {
    return view('frontend.pages.index');
});


Route::get('/', [FrontendController::class, 'index'])->name('frontend.pages.index');