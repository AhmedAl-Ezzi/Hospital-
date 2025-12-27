<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificationController extends Controller
{

public function fetch()
{
    $notifications = Notification::where('doctor_id', auth()->id())
        ->latest()
        ->take(10)
        ->get()
        ->map(function ($n) {
            $n->formatted_date = Carbon::parse($n->created_at)
                ->translatedFormat('Y-m-d   h:i A');
            return $n;
        });

    return response()->json([
        'count' => $notifications->where('reader_status', 0)->count(),
        'data'  => $notifications
    ]);
}


}
