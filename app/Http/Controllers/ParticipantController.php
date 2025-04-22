<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventParticipant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function registerEvent(Request $request)
{
    // Check if user already registered for this event
    $existingRegistration = EventParticipant::where('event_id', $request->event_id)
        ->where('user_id', Auth::user()->id)
        ->first();
    
    if ($existingRegistration) {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah terdaftar untuk event ini'
            ], 422);
        }
        
        return redirect()->back()->with('error', 'Anda sudah terdaftar untuk event ini');
    }
    
    // Register for the event
    EventParticipant::create([
        'event_id' => $request->event_id,
        'user_id' => Auth::user()->id
    ]);
    
    // You could add email sending logic here
    
    if ($request->ajax()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Pendaftaran berhasil! Silahkan cek email Anda untuk informasi lebih lanjut.'
        ]);
    }
    
    return redirect()->back()->with('success', 'Pendaftaran berhasil! Silahkan cek email Anda untuk informasi lebih lanjut.');
}

}
