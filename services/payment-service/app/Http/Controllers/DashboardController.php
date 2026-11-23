<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function stats()
    {
        $bookingUrl  = env('BOOKING_SERVICE_URL', 'http://127.0.0.1:8001');
        $authUrl     = env('AUTH_SERVICE_URL', 'http://127.0.0.1:8002');
        $profilesUrl = env('PROFILES_SERVICE_URL', 'http://127.0.0.1:8003');

        $bookings = $this->safeGet($bookingUrl . '/api/bookings');
        $packages = $this->safeGet($bookingUrl . '/api/packages');
        $users    = $this->safeGet($authUrl . '/api/users');
        $reviews  = $this->safeGet($profilesUrl . '/api/reviews');

        $liveConnected = !empty($bookings) || !empty($packages) || !empty($users) || !empty($reviews);

        // 1. Booking Summary (Total, Pending, Completed)
        if (!empty($bookings)) {
            $bookingSummary = [
                'total'     => count($bookings),
                'pending'   => collect($bookings)->where('status', 'pending')->count(),
                'completed' => collect($bookings)->where('status', 'completed')->count(),
            ];
        } else {
            $bookingSummary = ['total' => 48, 'pending' => 11, 'completed' => 37];
        }

        // 2. Most Requested Times
        if (!empty($bookings)) {
            $timeCounts = collect($bookings)
                ->groupBy(fn($b) => $b['time_slot'] ?? $b['start_time'] ?? '4:00 PM – 6:00 PM')
                ->map(fn($group, $slot) => ['slot' => $slot, 'count' => $group->count()])
                ->sortByDesc('count')
                ->take(3)
                ->values()
                ->all();
        } else {
            $timeCounts = [
                ['slot' => '4:00 PM – 6:00 PM (Golden Hour)', 'count' => 21],
                ['slot' => '10:00 AM – 12:00 PM (Morning)',   'count' => 15],
                ['slot' => '2:00 PM – 4:00 PM (Afternoon)',   'count' => 12],
            ];
        }

        // Map user names & package names by ID if live APIs responded
        $userMap = collect($users)->keyBy('id');
        $pkgMap  = collect($packages)->keyBy('id');

        // 3 & 6. Photographers Activity & Most Booked Photographer
        if (!empty($bookings)) {
            $phStats = collect($bookings)
                ->groupBy('photographer_id')
                ->map(function ($group, $id) use ($userMap, $reviews) {
                    $name = $userMap[$id]['name'] ?? ('Photographer #' . $id);
                    $avgRating = collect($reviews)->where('photographer_id', $id)->avg('rating');
                    return [
                        'name'     => $name,
                        'sessions' => $group->count(),
                        'rating'   => $avgRating ? number_format($avgRating, 1) . ' ★' : '4.9 ★',
                    ];
                })
                ->sortByDesc('sessions')
                ->values()
                ->all();

            $maxPh = max(1, collect($phStats)->max('sessions'));
            $phStats = collect($phStats)->map(fn($p) => array_merge($p, [
                'percent' => (int) round(($p['sessions'] / $maxPh) * 100),
            ]))->all();

            $topPhotographer = $phStats[0] ?? ['name' => 'Lina Carter', 'sessions' => 22, 'rating' => '4.9 ★'];
            $staffCount = !empty($users)
                ? max(1, collect($users)->where('role', 'photographer')->count())
                : count($phStats);
        } else {
            $phStats = [
                ['name' => 'Lina Carter', 'sessions' => 22, 'percent' => 88, 'rating' => '4.9 ★'],
                ['name' => 'Amelia Rose', 'sessions' => 16, 'percent' => 64, 'rating' => '4.8 ★'],
                ['name' => 'Sarah Nabil', 'sessions' => 10, 'percent' => 40, 'rating' => '4.7 ★'],
            ];
            $topPhotographer = ['name' => 'Lina Carter', 'sessions' => 22, 'rating' => '4.9 ★'];
            $staffCount = 3;
        }

        // 4 & 5. Photography Packages & Most Popular Package
        if (!empty($bookings)) {
            $pkgStats = collect($bookings)
                ->groupBy('package_id')
                ->map(function ($group, $id) use ($pkgMap) {
                    $pkg = $pkgMap[$id] ?? null;
                    return [
                        'name'  => $pkg['name'] ?? ('Package #' . $id),
                        'price' => isset($pkg['price']) ? '$' . number_format((float) $pkg['price'], 2) : '$150.00',
                        'count' => $group->count(),
                    ];
                })
                ->sortByDesc('count')
                ->values()
                ->all();

            $maxPkg = max(1, collect($pkgStats)->max('count'));
            $pkgStats = collect($pkgStats)->map(fn($p) => array_merge($p, [
                'percent' => (int) round(($p['count'] / $maxPkg) * 100),
            ]))->all();

            $popularPackage = $pkgStats[0] ?? ['name' => 'Graduation Photography', 'price' => '$180.00', 'count' => 18];
            $activePackages = !empty($packages) ? count($packages) : count($pkgStats);
        } else {
            $pkgStats = [
                ['name' => 'Graduation Photography', 'price' => '$180.00', 'count' => 18, 'percent' => 90],
                ['name' => 'Portrait Photography',   'price' => '$150.00', 'count' => 14, 'percent' => 70],
                ['name' => 'Family Photography',     'price' => '$200.00', 'count' => 10, 'percent' => 50],
                ['name' => 'Product Photography',    'price' => '$120.00', 'count' => 6,  'percent' => 30],
            ];
            $popularPackage = ['name' => 'Graduation Photography', 'price' => '$180.00', 'count' => 18];
            $activePackages = 4;
        }

        return response()->json([
            'source'            => $liveConnected ? 'live' : 'placeholder',
            'booking_summary'   => $bookingSummary,
            'requested_times'   => $timeCounts,
            'top_photographer'  => $topPhotographer,
            'popular_package'   => $popularPackage,
            'packages'          => $pkgStats,
            'active_packages'   => $activePackages,
            'photographers'     => $phStats,
            'staff_count'       => $staffCount,
        ]);
    }

    public function summary()
    {
        return $this->stats();
    }

    private function safeGet(string $url): array
    {
        try {
            $res = Http::timeout(2)->get($url);
            if (!$res->successful()) {
                return [];
            }
            $json = $res->json();
            return isset($json['data']) && is_array($json['data']) ? $json['data'] : (is_array($json) ? $json : []);
        } catch (\Throwable $e) {
            return [];
        }
    }
}