<?php

use App\Livewire\HomePage;
use App\Livewire\LoginWithOtp;
use App\Livewire\NewsDetail;
use App\Livewire\NewsRecord;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/news/{id}', NewsDetail::class)->name('news.show');
Route::get('/news/record/{id}', NewsRecord::class)->name('news.record')->middleware('auth');
//Route::get('/admin/news/review/{id}', AdminReview::class)->name('admin.news.review')->middleware('admin');
Route::get('/login', LoginWithOtp::class)->name('login');

