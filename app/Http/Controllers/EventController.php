<?php

namespace App\Http\Controllers;

use App\Models\CompanyExport;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Menampilkan daftar event (untuk halaman publik).
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $events = Event::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('description', 'like', '%' . $search . '%')
                         ->orWhere('location', 'like', '%' . $search . '%');
        })->latest()->paginate(10);

        return view('event', compact('events'));
    }

    /**
     * Menampilkan detail event tertentu (untuk halaman publik).
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $relatedEvents = Event::where('id', '!=', $id)->latest()->take(3)->get();
        $company = CompanyExport::where('event_id', $id)->get();
        $participantCount = $event->participants()->count();
        return view('event', compact('event', 'relatedEvents', 'company', 'participantCount'));
    }

    /**
     * Menampilkan daftar event untuk admin.
     */
    public function adminIndex(Request $request)
    {
        $search = $request->query('search');
        $events = Event::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('description', 'like', '%' . $search . '%')
                         ->orWhere('location', 'like', '%' . $search . '%');
        })->latest()->paginate(10);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Menampilkan form untuk membuat event baru (jika diperlukan, tapi modal sudah menangani ini).
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Menyimpan event baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'location_url' => 'required|url|regex:/^https:\/\/www\.google\.com\/maps\/embed\?/',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event = new Event();
        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];
        $event->location = $validated['location'];
        $event->location_url = $validated['location_url'];
        $event->image = $request->file('image')->store('events', 'public');
        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit event (jika diperlukan, tapi modal sudah menangani ini).
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Memperbarui event yang ada.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'location_url' => 'required|url|regex:/^https:\/\/www\.google\.com\/maps\/embed\?/',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];
        $event->location = $validated['location'];
        $event->location_url = $validated['location_url'];
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $event->image = $request->file('image')->store('events', 'public');
        }
        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Menghapus event.
     */
    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus.');
    }

    /**
     * Menampilkan daftar peserta event.
     */
    public function participants($id)
    {
        $event = Event::findOrFail($id);
        $participants = $event->participants()->paginate(10);
        return view('admin.event.participants', compact('event', 'participants'));
    }
}