@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-layout>
    <x-slot:heading>
        Companies & Employers
    </x-slot:heading>

    <ul role="list" class="space-y-5">
        @foreach($employers as $employer)
            <li class="job-item opacity-0">
                <x-card href="/employers/{{ $employer->id }}">
                    <p class="text-xl font-semibold">{{ $employer->name }}</p>
                </x-card>
            </li>
        @endforeach
    </ul>

    <div class="job-item opacity-0">
        {{ $employers->links('vendor.pagination.custom-black') }}
    </div>

    <!-- Link Compiled CSS File -->
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">

    <!-- Link Compiled JavaScript File -->
    <script src="{{ asset('js/animations.js') }}"></script>
</x-layout>
