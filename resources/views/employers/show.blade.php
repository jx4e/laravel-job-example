<x-layout>
    @if($employer != null)
        <x-slot:heading>
            {{ $employer->name }}
        </x-slot:heading>
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base/7 font-semibold text-gray-900">Employer Information</h3>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Employer</dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $employer->name }}</dd>
                    </div>
                </dl>
            </div>
        </div>

    @else
        <x-slot:heading>
        </x-slot:heading>

        <x-404 back="/employers"></x-404>
    @endif
</x-layout>
