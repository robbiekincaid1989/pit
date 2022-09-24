<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 text-gray-800 leading-tight">
            {{ __('Editing ') }}{{ $newspost->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-black bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-gray-800 bg-white dark:text-gray-100 text-black">
                    @if($errors->any())
                        <div class="dark:text-red-500 text-red-800">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('newsposts.update', $newspost) }}">
                        @method('PUT')
                        @csrf
                        Title:
                        <br>
                        <input class="w-full rounded-md shadow-sm border-gray-300 dark:text-gray-200 dark:bg-gray-900" type="text" name="title" value="{{ $newspost->title }}">
                        <br>
                        <br>
                        Content:
                        <br>
                        <textarea style="resize: none" class="w-full rounded-md shadow-sm border-gray-300 dark:text-gray-200 dark:bg-gray-900" type="text" name="content" rows="30">{{ $newspost->content }}</textarea>
                        <br>
                        <br>
                        Category:
                        <br>
                        <select class="w-full rounded-md shadow-sm border-gray-300 dark:text-gray-200 dark:bg-gray-900" name="newscategory_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @selected($category->id == $newspost->newscategory_id)>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <button class="inline-flex items-center px-4 py-2 dark:bg-gray-900 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
