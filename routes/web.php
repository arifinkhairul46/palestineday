<?php

use App\Http\Controllers\BotTelegramController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/', [HomeController::class, 'simpan_donasi'])->name('simpan_donasi');
Route::get('berhasil/{id}', [HomeController::class, 'berhasil'])->name('berhasil');
Route::get('message', [BotTelegramController::class, 'message'])->name('pesan');

