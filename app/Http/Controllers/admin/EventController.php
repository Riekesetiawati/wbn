<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request->search;
        
        $events = Event::when($search, function($query) use ($search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                         ->orWhere('description', 'LIKE', "%{$search}%")
                         ->orWhere('location', 'LIKE', "%{$search}%");
        })->latest()->paginate(10);
        
        // Buat pagination tetap mempertahankan parameter pencarian saat pindah halaman
        if ($search) {
            $events->appends(['search' => $search]);
        }
        
        return view('admin.event', compact('events'));
    }

   
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string|max:255',
            'location_url' => 'required|url',
        ]);

        // Upload dan simpan gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('events', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Simpan event baru
        Event::create($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil dibuat!');
    }

    
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    
    public function update(Request $request, Event $event)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string|max:255',
            'location_url' => 'required|url',
        ]);

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('events', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Update event
        $event->update($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

  
    public function destroy(Event $event)
    {
        // Hapus gambar terkait jika ada
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus event
        $event->delete();

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil dihapus!');
    }

    public function showParticipants($event_id)
{
    // Cari event berdasarkan ID
    $event = Event::with('participants')->findOrFail($event_id);
    
    // Mengakses participants melalui relasi
    $participants = $event->participants;
    
    // Mengirim data ke view
    return view('admin.participant-event', compact('event', 'participants'));
}
}