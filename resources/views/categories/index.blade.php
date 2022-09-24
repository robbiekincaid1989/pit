<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 text-gray-800 leading-tight">
            {{ __('Categories Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-black bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-gray-800 bg-white dark:text-gray-100 text-black">
                    <a href="{{ route('categories.create') }}"><button class="inline-flex items-center px-4 py-2 dark:bg-gray-900 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">New</button></a>
                    <br>
                    <br>
                    <table class="w-full table-auto overflow-hidden rounded dark:border-gray-700">
                        <thead class="border-solid border-2 dark:border-gray-700 dark:bg-gray-700 bg-gray-100">
                            <tr>
                                <th class="p-4 text-center">Name</th>
                                <th class="p-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-solid border-2 dark:border-gray-700">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="p-4 text-center">{{ $category->name }}</td>
                                    <td class="p-4 text-center"><a href="{{ route('categories.edit', $category) }}">Edit</a> | 
                                    <form class="inline" method="POST" action="{{ route('categories.destroy', $category) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
