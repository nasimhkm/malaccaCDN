<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnalyticsDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini Anda bisa mendaftarkan route API untuk aplikasi Anda. Route ini
| dimuat oleh RouteServiceProvider dan semuanya akan otomatis diberi
| middleware 'api' dan prefix '/api'.
|
*/

Route::get('/analytics-dashboard', [AnalyticsDashboardController::class, 'fetchDashboardData']);
