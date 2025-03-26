<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="flex items-center space-x-2 mt-4">
            <button id="theme-toggle" class="relative w-12 h-6 bg-gray-300 rounded-full p-1 dark:bg-gray-600 transition-colors duration-300 overflow-hidden">
                <div id="toggle-circle" class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full shadow-md transform transition-transform duration-300"></div>
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
   
</x-app-layout>
