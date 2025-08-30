<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class AnalyticsDashboardController extends Controller
{
    public function fetchDashboardData()
    {
        try {
            // Tentukan periode waktu, misalnya 30 hari terakhir
            $period = Period::days(30);

            // 1. Data Ringkasan (Total Pengguna & Sesi)
            // Di v4, tidak ada cara langsung untuk mendapat total user/sesi.
            // Kita akan mengakali dengan menjumlahkan data harian.
            $dailyStatsForTotals = Analytics::fetchTotalVisitorsAndPageViews($period);
            
            $totalUsers = $dailyStatsForTotals->sum('activeUsers');
            // 'sessions' tidak tersedia langsung di v4, kita gunakan 'screenPageViews' sebagai representasi aktivitas.
            $totalSessions = $dailyStatsForTotals->sum('screenPageViews'); 
            
            $summary = [['totalUsers' => $totalUsers, 'sessions' => $totalSessions]];

            // 2. Data untuk Grafik (Pengunjung per Hari)
            $dailyQuery = Analytics::fetchTotalVisitorsAndPageViews($period);
            $dailyStats = $dailyQuery->map(fn (array $row) => [
                'date' => $row['date'], // Sudah dalam format Carbon
                'visitors' => $row['activeUsers'],
                'pageViews' => $row['screenPageViews'],
            ]);

            // 3. Halaman Terpopuler (Top 10)
            $pagesQuery = Analytics::fetchMostVisitedPages($period, 10);
            $mostVisitedPages = $pagesQuery->map(fn (array $row) => [
                'url' => $row['fullPageUrl'], // Kunci di v4 adalah 'fullPageUrl'
                'pageViews' => $row['screenPageViews'],
            ]);

            // 4. Sumber Rujukan Teratas (Top 10)
            $topReferrers = Analytics::fetchTopReferrers($period, 10);

            // Gabungkan semua data menjadi satu respons
            $data = [
                'summary' => $summary,
                'daily_stats' => $dailyStats,
                'most_visited_pages' => $mostVisitedPages,
                'top_referrers' => $topReferrers,
            ];

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            // Jika terjadi error, kirim respons error
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dari Google Analytics: ' . $e->getMessage()
            ], 500);
        }
    }
}