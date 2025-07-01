<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Block\Document;
use thiagoalessio\TesseractOCR\TesseractOCR;



Route::get('/', [UserController::class, 'check'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('add', [DocumentController::class, 'show'])->middleware('auth');
Route::post('docs/add', [DocumentController::class, 'store'])->middleware('auth');
Route::get('docs/{id}', [DocumentController::class, 'createFileUrl'])->whereNumber('id')->middleware('auth')->name('docs');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth');


