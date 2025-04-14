<a class="flex justify-between gap-x-6 py-8 px-6
                    bg-black bg-opacity-5 rounded-3xl
                    border-0 border-gray-800
                    hover:border-2
                    transition-all duration-100"
    {{ $attributes }}>
    <div class="flex min-w-0 gap-x-4">
        <div class="min-w-0 flex-auto space-y-2">
            {{ $slot }}
        </div>
    </div>
</a>
