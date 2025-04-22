@extends('layouts.app')
@section('title', 'Event Participants')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Participants for Event: {{ $event->title }}
                    </h5>
                    <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-secondary">Back to Events</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h6>Event Details:</h6>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                    </div>

                    <h6>Participant List</h6>
                    @if($participants->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($participants as $participant)
                                        <tr>
                                            <td>{{ $participant->name }}</td>
                                            <td>{{ $participant->email }}</td>
                                            <td>{{ $participant->phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No participants have joined this event yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection