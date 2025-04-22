<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('event');
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        $relatedEvents = Event::where('id', '!=', $id)->latest()->take(3)->get();
        return view('event', compact('event', 'relatedEvents'));
    }
}
