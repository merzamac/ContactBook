<?php
use App\Http\Controllers\Contacts;
use Illuminate\Support\Facades\Route;

Route::get('/', [Contacts::class, 'index']) -> name('index');

Route::get('/create',[Contacts::class,'create'])->name('create');

Route::post('/store',[Contacts::class,'store'])->name('store');

Route::get('/show/{id}',[Contacts::class,'show'])->name('show');

Route::post('/edit/{id}',[Contacts::class,'edit'])->name('edit');

Route::get('/destroy/{id}',[Contacts::class,'destroy'])->name('destroy');