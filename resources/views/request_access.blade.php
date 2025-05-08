@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Request Admin Approval</h2>

    @if(session('status'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('request.access.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Request Type</label>
            <input type="text" name="type" class="w-full border p-2 rounded" placeholder="e.g. Role Change" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Message</label>
            <textarea name="message" class="w-full border p-2 rounded" rows="4" placeholder="Explain your request..."></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit Request</button>
    </form>
</div>
@endsection
