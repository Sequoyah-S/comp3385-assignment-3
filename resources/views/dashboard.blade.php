@extends('layouts.app')

@section('content')
    <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>

    <div class="mt-4">
        <h2>Clients</h2>
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <ul>
                @foreach ($clients as $client)
                    <li>
                        <strong>Name:</strong> {{ $client->name }}<br>
                        <strong>Email:</strong> {{ $client->email }}<br>
                        <strong>Telephone:</strong> {{ $client->telephone }}<br>
                        <strong>Address:</strong> {{ $client->address }}<br>
                        @if ($client->company_logo)
                            <img src="{{ asset('storage/' . $client->company_logo) }}" alt="Company Logo">
                        @else
                            <p>No company logo available.</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="mt-4">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a>
    </div>
@endsection
