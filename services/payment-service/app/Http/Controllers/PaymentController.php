<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // GET /api/payments (Admin) - Get all payments
    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    // POST /api/payments - Create a payment record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|integer',
            'client_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:card,online',
            'status' => 'nullable|in:paid,unpaid,refunded',
            'payment_date' => 'nullable|date',
            'transaction_id' => 'nullable|string'
        ]);

        // If status is passed as paid but no date is provided, set the date automatically
        if (isset($validated['status']) && $validated['status'] === 'paid' && empty($validated['payment_date'])) {
            $validated['payment_date'] = now();
        }

        $payment = Payment::create($validated);

        return response()->json([
            'message' => 'Payment created successfully',
            'payment' => $payment
        ], 201);
    }

    // GET /api/dashboard/stats - Get dashboard statistics
    public function getStats()
    {
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');
        $totalPayments = Payment::count();
        $paidCount = Payment::where('status', 'paid')->count();
        $unpaidCount = Payment::where('status', 'unpaid')->count();

        return response()->json([
            'total_revenue' => $totalRevenue,
            'total_transactions' => $totalPayments,
            'paid_transactions' => $paidCount,
            'unpaid_transactions' => $unpaidCount,
        ]);
    }

    // GET /api/dashboard/summary - Get summary data
    public function getSummary()
    {
        // Fetch the 5 most recent payments for a quick dashboard summary
        $recentPayments = Payment::orderBy('created_at', 'desc')->take(5)->get();
        
        return response()->json([
            'recent_payments' => $recentPayments
        ]);
    }
}