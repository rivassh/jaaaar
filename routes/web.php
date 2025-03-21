<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\AdminAddNews;
use App\Livewire\AdminReview;
use App\Livewire\AnyController;
use App\Livewire\HomePage;
use App\Livewire\JournalistDashboard;
use App\Livewire\LoginWithOtp;
use App\Livewire\NewsDetail;
use App\Livewire\NewsRecord;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/news/{id}', NewsDetail::class)->name('news.show');
Route::get('/news/record/{id}', NewsRecord::class)->name('news.record')->middleware('auth');
Route::get('/admin/news/review/{id}', AdminReview::class)->name('admin.news.review')->middleware(AdminMiddleware::class);
Route::get('/login', LoginWithOtp::class)->name('login');
Route::post('/{any}', AnyController::class)->name('any');


Route::get('/dashboard', JournalistDashboard::class)->middleware(['auth'])->name('dashboard');

Route::post('/news/record/{id}/save', [AudioController::class, 'save'])->name('news.record.save')->middleware('auth');


Route::get('/admin/dashboard', AdminReview::class)->middleware(['auth', AdminMiddleware::class])->name('admin.dashboard');
Route::get('/admin/news/add', AdminAddNews::class)->middleware(['auth', AdminMiddleware::class])->name('admin.news.add');
