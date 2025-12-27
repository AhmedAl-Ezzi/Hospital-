<?php

namespace App\Http\Controllers\Dashboard_Doctor;


use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetch()
    {
        // جلب إشعارات الطبيب الحالي فقط
        $doctorId = auth()->guard('doctor')->id();

        $notifications = Notification::where('doctor_id', $doctorId)
            ->orWhere('user_id', $doctorId)
            ->latest()
            ->take(20)
            ->get();

        return response()->json([
            'count' => $notifications->where('reader_status', 0)->count(),
            'data'  => $notifications->map(function($notification) {
                return $this->formatNotification($notification);
            })
        ]);
    }

    private function formatNotification($notification)
    {
        return [
            'id' => $notification->id,
            'title' => 'فاتورة جديدة',
            'message' => $notification->message,
            'invoice_number' => $this->extractInvoiceNumber($notification->message),
            'patient_name' => $this->extractPatientName($notification->description ?? ''),
            'invoice_date' => $notification->created_at->format('Y-m-d H:i:s'),
            'created_at' => $notification->created_at->format('Y-m-d H:i:s'),
            'time_ago' => $notification->created_at->diffForHumans(),
            'invoice_type' => $this->extractInvoiceType($notification->description ?? ''),
            'is_read' => $notification->reader_status == 1
        ];
    }

    private function extractInvoiceNumber($message)
    {
        preg_match('/#(\d+)/', $message, $matches);
        return $matches[1] ?? 'غير معروف';
    }

    private function extractPatientName($description)
    {
        if (str_contains($description, 'اسم المريض:')) {
            $parts = explode('اسم المريض:', $description);
            return trim($parts[1]) ?? 'غير معروف';
        }
        return 'غير معروف';
    }

    private function extractInvoiceType($description)
    {
        if (str_contains($description, 'نقدي')) return 'نقدي';
        if (str_contains($description, 'آجل')) return 'آجل';
        return 'فاتورة';
    }

    public function markAsRead(Request $request)
    {
        $doctorId = auth()->guard('doctor')->id();

        if ($request->id == 'all') {
            Notification::where('doctor_id', $doctorId)
                ->orWhere('user_id', $doctorId)
                ->update(['reader_status' => 1]);
        } else {
            $notification = Notification::where('id', $request->id)
                ->where(function($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId)
                          ->orWhere('user_id', $doctorId);
                })
                ->first();

            if ($notification) {
                $notification->update(['reader_status' => 1]);
            }
        }

        return response()->json(['success' => true]);
    }
}
