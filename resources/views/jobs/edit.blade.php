<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}/">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
{{--                <div class="mt-10">--}}
{{--                    @if($errors->any())--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li class="text-red-500 italic">{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    @endif--}}
{{--                </div>--}}



                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Job Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white">
                                <input value="{{ $job->title }}" type="text" name="title" id="title" class="block w-full min-w-0 grow py-1.5 pr-3 pl-2 text-base text-gray-900 placeholder:text-gray-400 outline-none sm:text-sm/6 border border-1 rounded-lg shadow-md focus:border-4 transition-all duration-300" placeholder="Job Title">
                            </div>

                            @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white">
                                <input value="{{ $job->salary }}" type="text" name="salary" autocomplete="off" id="salary" class="block w-full min-w-0 grow py-1.5 pr-3 pl-2 text-base text-gray-900 placeholder:text-gray-400 outline-none sm:text-sm/6 border border-1 rounded-lg shadow-md focus:border-4 transition-all duration-300" placeholder="$$$">
                            </div>

                            @error('salary')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white">
                                <textarea name="description" id="description" rows="3" class="block w-full min-w-0 grow py-1.5 pr-3 pl-2 text-base text-gray-900 placeholder:text-gray-400 outline-none sm:text-sm/6 border border-1 rounded-lg shadow-md focus-within:border-4 transition-all duration-300">{{ $job->description }}</textarea>
                            </div>
                            @error('description')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences describing the job.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center gap-x-6">
                <button form='delete-form' type="sumbit" class="px-4 py-2 bg-red-600 text-white text-sm rounded-full shadow-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition-colors duration-500 ease-in-out">
                    Delete
                </button>
            </div>
            <div class="flex items-center gap-x-6">
                <a type="button"
                   class="text-sm/6 font-semibold text-gray-900"
                   href="/jobs/{{ $job->id }}/">Cancel</a>
                <button type="sumbit" class="px-4 py-2 bg-black text-white text-sm rounded-full shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-opacity-75 transition-colors duration-500 ease-in-out">
                    Save
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
