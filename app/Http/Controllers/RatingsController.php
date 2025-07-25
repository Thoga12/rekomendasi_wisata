<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    //
    public function store(Request $request, $destinationId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Update jika user sudah pernah rating sebelumnya
        UserHistory::create([
            'user_id' => auth()->id(),
            'activity' => 'Memberi Rating',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        Ratings::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'destinasi_id' => $destinationId,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return redirect()->back()->with('success', 'Terima kasih atas rating Anda!');
    }
}
