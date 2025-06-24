<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="flex items-center space-x-2 mt-4">
            <button id="theme-toggle"
                class="relative w-12 h-6 bg-gray-300 rounded-full p-1 dark:bg-gray-600 transition-colors duration-300 overflow-hidden">
                <div id="toggle-circle"
                    class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full shadow-md transform transition-transform duration-300">
                </div>
            </button>
        </div>



    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-2xl mx-auto mt-5">
        <h4 class="font-bold text-lg mb-4">Recent Activities</h4>

        <ul class="space-y-2">
            @forelse($activities as $activity)
            <li class="p-2 bg-gray-100 rounded">
                {{ $activity->activity }}
                <span class="text-sm text-gray-500">({{ $activity->created_at->diffForHumans() }})</span>
            </li>
            @empty
            <li>No activities found.</li>
            @endforelse
        </ul>
    </div>
    @if (session('status'))
    <div class="alert alert-success mt-2">{{ session('status') }}</div>
    @endif

   


</x-app-layout>