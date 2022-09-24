<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-black bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-gray-800 bg-white dark:text-gray-100 text-black">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
