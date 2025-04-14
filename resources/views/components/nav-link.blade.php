@props(['active' => false, 'type' => 'a'])

@if($type == 'a')
    <a class="{{ $active ? 'bg-transparent text-gray-500' : 'text-black hover:text-gray-500'}} px-3 py-1 text-sm font-light"
       aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button class="{{ $active ? 'bg-transparent text-gray-500' : 'text-black hover:text-gray-500'}} rounded-md px-3 py-2 text-sm font-sm"
       aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
