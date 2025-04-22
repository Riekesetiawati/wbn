<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventParticipant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $registration = EventParticipant::create([
            'event_id' => $request->event_id,
            'user_id' => Auth::user()->id
        ]);
        
        // Prepare response first
        $response = null;
        if ($request->ajax()) {
            $response = response()->json([
                'status' => 'success',
                'message' => 'Pendaftaran berhasil! Silahkan cek email Anda untuk informasi lebih lanjut.'
            ]);
        } else {
            $response = redirect()->back()->with('success', 'Pendaftaran berhasil! Silahkan cek email Anda untuk informasi lebih lanjut.');
        }
        
        // Get event details for the email
        $event = Event::findOrFail($request->event_id);
        $user = Auth::user();
        
        // Send confirmation email in the background
        $this->sendConfirmationEmail($user, $event, $registration);
        
        // Return response immediately without waiting for email
        return $response;
    }
    
    /**
     * Send confirmation email in the background
     *
     * @param \App\Models\User $user
     * @param \App\Models\Event $event
     * @param \App\Models\EventParticipant $registration
     * @return void
     */
    private function sendConfirmationEmail($user, $event, $registration)
    {
        // Using a closure to dispatch email sending without blocking the response
        dispatch(function() use ($user, $event, $registration) {
            Mail::send('emails.event-registration', [
                'user' => $user,
                'event' => $event,
                'registration' => $registration
            ], function ($message) use ($user, $event) {
                $message->to($user->email, $user->name)
                        ->subject('🎉 Selamat! Petualangan Baru Menanti di ' . $event->name);
            });
        });
    }
}