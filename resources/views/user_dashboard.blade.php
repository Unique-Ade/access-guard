<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

      <br>

        <!-- Dark Mode Toggle -->
        <label class="relative inline-block w-12 h-6 cursor-pointer">
            <!-- Hidden checkbox with peer -->
            <input type="checkbox" id="theme-toggle" class="sr-only peer">

            <!-- Track -->
            <div class="w-full h-full bg-gray-300 dark:bg-gray-700 rounded-full transition-colors duration-300"></div>

            <!-- Knob -->
            <div
                class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full transition-transform duration-300 peer-checked:translate-x-6">
            </div>
        </label>

          <script>
    const themeToggle = document.getElementById('theme-toggle');

    // Load initial state
    if (localStorage.theme === 'dark') {
        document.documentElement.classList.add('dark');
        themeToggle.checked = true;
    }

    themeToggle.addEventListener('change', () => {
        if (themeToggle.checked) {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        }
    });
</script>







    </x-slot>

    {{-- @if (auth()->user()->profile_image)
    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"
        class="w-24 h-24 rounded-full object-cover m-16 mt-8 mb-0">
    @else
    <p>No profile image uploaded.</p>
    @endif --}}

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