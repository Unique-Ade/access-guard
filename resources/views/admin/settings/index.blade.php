@extends('admin.layout')

@section('content')
    <h1 class="text-xl font-bold mb-4">Site Settings</h1>

    @if (session('success'))
        <div class="p-2 bg-green-200 text-green-800 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
            <input type="text" name="site_name" id="site_name"
                value="{{ $settings['site_name'] ?? '' }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="maintenance_mode" class="block text-sm font-medium text-gray-700">Maintenance Mode</label>
            <select name="maintenance_mode" id="maintenance_mode" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                <option value="off" {{ ($settings['maintenance_mode'] ?? '') == 'off' ? 'selected' : '' }}>Off</option>
                <option value="on" {{ ($settings['maintenance_mode'] ?? '') == 'on' ? 'selected' : '' }}>On</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Save Settings
        </button>
    </form>
@endsection
