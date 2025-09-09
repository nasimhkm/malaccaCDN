<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
// OrderBy utama
use Google\Analytics\Data\V1beta\OrderBy;
// Nested classes untuk sorting
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Illuminate\Support\Carbon;

class AnalyticsDashboardController extends Controller
{
    public function fetchDashboardData()
    {
        try {
            // Periode default = 30 hari terakhir
            $period = Period::days(30);

            // -----------------------------------------------------------------
            // 1) SUMMARY KPIs
            // -----------------------------------------------------------------
            // 1) SUMMARY KPIs
$summaryResult = Analytics::get(
    $period,
    // TAMBAHKAN 'screenPageViews' DI SINI
    ['sessions', 'activeUsers', 'newUsers', 'engagementRate', 'averageSessionDuration', 'screenPageViews']
);

$summary = [
    'sessions' => 0,
    'totalUsers' => 0,
    'newUsers' => 0,
    'engagementRate' => 0,
    'averageSessionDuration' => 0,
    'bounceRate' => 0,
    'pageViews' => 0, // Tambahkan key baru
];

if ($row = $summaryResult->first()) {
    $summary['sessions'] = (int) ($row['sessions'] ?? 0);
    $summary['totalUsers'] = (int) ($row['activeUsers'] ?? 0);
    $summary['newUsers'] = (int) ($row['newUsers'] ?? 0);
    $summary['pageViews'] = (int) ($row['screenPageViews'] ?? 0); // Ambil data page views

    $engagementRate = (float) ($row['engagementRate'] ?? 0);
    $summary['engagementRate'] = round($engagementRate * 100, 2);
    $summary['bounceRate'] = round((1 - $engagementRate) * 100, 2);

    $avgDuration = (float) ($row['averageSessionDuration'] ?? 0);
    // Format durasi menjadi HH:MM:SS
    $summary['averageSessionDuration'] = gmdate('H:i:s', (int)$avgDuration);
}

            // -----------------------------------------------------------------
            // Cek apakah nested OrderBy tersedia
            // -----------------------------------------------------------------
            $hasOrderByNested = class_exists(\Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy::class)
                && class_exists(\Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy::class);

            // -----------------------------------------------------------------
            // 2) DAILY STATS
            // -----------------------------------------------------------------
            if ($hasOrderByNested) {
                $dailyRaw = Analytics::get(
                    $period,
                    ['sessions', 'activeUsers'],
                    ['date'],
                    100,
                    [
                        new OrderBy([
                            'dimension' => new DimensionOrderBy([
                                'dimension_name' => 'date',
                            ]),
                        ]),
                    ]
                );
            } else {
                $dailyRaw = Analytics::get(
                    $period,
                    ['sessions', 'activeUsers'],
                    ['date'],
                    100
                );
            }

            $dailyStats = $dailyRaw
                ->sortBy(fn($r) => $r['date'])
                ->map(function (array $row) {
                    $dateString = $row['date'];

                    // parsing fleksibel
                    if (preg_match('/^\d{8}$/', $dateString)) {
                        // contoh: 20250910
                        $date = Carbon::createFromFormat('Ymd', $dateString)->format('Y-m-d');
                    } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateString)) {
                        // contoh: 2025-09-10
                        $date = Carbon::parse($dateString)->format('Y-m-d');
                    } else {
                        // fallback, biarkan string as-is
                        $date = $dateString;
                    }

                    return [
                        'date' => $date,
                        'sessions' => (int) ($row['sessions'] ?? 0),
                        'users' => (int) ($row['activeUsers'] ?? 0),
                    ];
                })
                ->values();

            // -----------------------------------------------------------------
            // 3) MOST VISITED PAGES
            // -----------------------------------------------------------------
            if ($hasOrderByNested) {
                $pagesRaw = Analytics::get(
                    $period,
                    ['screenPageViews'],
                    ['pagePath'],
                    100,
                    [
                        new OrderBy([
                            'metric' => new MetricOrderBy(['metric_name' => 'screenPageViews']),
                            'desc' => true,
                        ]),
                    ]
                );
            } else {
                $pagesRaw = Analytics::get(
                    $period,
                    ['screenPageViews'],
                    ['pagePath'],
                    100
                );
            }

            $mostVisitedPages = $pagesRaw
                ->sortByDesc(fn($r) => (int) ($r['screenPageViews'] ?? 0))
                ->take(10)
                ->map(fn(array $row) => [
                    'path' => $row['pagePath'],
                    'pageViews' => (int) ($row['screenPageViews'] ?? 0),
                ])
                ->values();

            // -----------------------------------------------------------------
            // 4) SESSIONS BY CHANNEL
            // -----------------------------------------------------------------
            if ($hasOrderByNested) {
                $sessionsByChannelRaw = Analytics::get(
                    $period,
                    ['sessions'],
                    ['sessionDefaultChannelGroup'],
                    100,
                    [
                        new OrderBy([
                            'metric' => new MetricOrderBy(['metric_name' => 'sessions']),
                            'desc' => true,
                        ]),
                    ]
                );
            } else {
                $sessionsByChannelRaw = Analytics::get(
                    $period,
                    ['sessions'],
                    ['sessionDefaultChannelGroup'],
                    100
                );
            }

            $sessionsByChannel = $sessionsByChannelRaw
                ->sortByDesc(fn($r) => (int) ($r['sessions'] ?? 0))
                ->take(10)
                ->map(fn(array $row) => [
                    'channel' => $row['sessionDefaultChannelGroup'] ?? 'unknown',
                    'sessions' => (int) ($row['sessions'] ?? 0),
                ])
                ->values();

            // -----------------------------------------------------------------
            // 5) USERS BY CHANNEL
            // -----------------------------------------------------------------
            if ($hasOrderByNested) {
                $usersByChannelRaw = Analytics::get(
                    $period,
                    ['activeUsers'],
                    ['sessionDefaultChannelGroup'],
                    100,
                    [
                        new OrderBy([
                            'metric' => new MetricOrderBy(['metric_name' => 'activeUsers']),
                            'desc' => true,
                        ]),
                    ]
                );
            } else {
                $usersByChannelRaw = Analytics::get(
                    $period,
                    ['activeUsers'],
                    ['sessionDefaultChannelGroup'],
                    100
                );
            }

            $usersByChannel = $usersByChannelRaw
                ->sortByDesc(fn($r) => (int) ($r['activeUsers'] ?? 0))
                ->take(10)
                ->map(fn(array $row) => [
                    'channel' => $row['sessionDefaultChannelGroup'] ?? 'unknown',
                    'users' => (int) ($row['activeUsers'] ?? 0),
                ])
                ->values();

            // -----------------------------------------------------------------
            // RESPONSE
            // -----------------------------------------------------------------
            return response()->json([
                'success' => true,
                'data' => [
                    'summary' => $summary,
                    'daily_stats' => $dailyStats,
                    'most_visited_pages' => $mostVisitedPages,
                    'sessions_by_channel' => $sessionsByChannel,
                    'users_by_channel' => $usersByChannel,
                ]
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dari Google Analytics: ' . $e->getMessage(),
            ], 500);
        }
    }
}
