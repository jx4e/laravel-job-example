@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-layout>
    <x-slot:heading>
        <div class="flex justify-between items-center">
            <div class="flex min-w-0 gap-x-4">
                Job Listings
            </div>
        </div>
    </x-slot:heading>

    <div class="flex justify-between items-center">
        <div class="hidden shrink-0 sm:flex sm:items-center">
            <a href="/jobs/create" class="px-4 py-2 bg-black text-white text-sm rounded-full shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-opacity-75 transition-colors duration-500 ease-in-out">
                Create
            </a>
        </div>
    </div>

    <hr class="my-4 border-gray-300" />

    <ul id="job-list" role="list" class="space-y-5">
        @foreach($jobs as $job)
            <li class="job-item opacity-0">
                <x-card href="/jobs/{{ $job->id }}">
                    <p class="text-xl font-semibold">{{ $job->title }}</p>
                    <p class="mt-1 truncate text-xs/5 ">{{ $job->employer->name }}</p>
                    <x-tag>£{{ $job->salary }} / yr</x-tag>
                </x-card>
            </li>
        @endforeach

        <div class="job-item opacity-0">
            {{ $jobs->links('vendor.pagination.custom-black') }}
        </div>
    </ul>

    <!-- Link Compiled CSS File -->
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">

    <!-- Link Compiled JavaScript File -->
    <script src="{{ asset('js/animations.js') }}"></script>
</x-layout>

