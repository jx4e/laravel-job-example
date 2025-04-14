<x-layout>
    @if($job != null)
        <x-slot:heading>
            {{ $job->title }}
        </x-slot:heading>
        <div class="space-y-10">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Title</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->title }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Employer</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->employer->name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Description</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $job->description }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Yearly Salary</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">£{{ $job->salary }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Tags</dt>
                    <div class="min-w-0 flex-auto inline-flex items-center gap-x-2">
                        @if($job->created_at && $job->created_at->gt(now()->subHour()))
                            <x-tag href="/">New</x-tag>
                        @endif
                        @foreach($job->tags as $tag)
                            <x-tag href="/">{{ $tag->name }}</x-tag>
                        @endforeach
                    </div>
                </div>
            </dl>
            <div class="hidden shrink-0 sm:flex sm:items-center ">
                <a href="/jobs/{{ $job->id }}/edit"
                   class="px-4 py-2
                           bg-black text-white rounded-full shadow-md
                           hover:bg-gray-800 focus:outline-none
                           focus:ring-2 focus:ring-gray-700 focus:ring-opacity-75
                           transition-colors duration-500 ease-in-out">
                    Edit
                </a>
            </div>
        </div>

    @else
        <x-slot:heading>
        </x-slot:heading>

        <x-404 back="/jobs"></x-404>
    @endif
</x-layout>
