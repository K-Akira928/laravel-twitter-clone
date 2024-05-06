@php
    switch (session('status')) {
        case 'alert':
            $borderColor = 'border-red-600';
            $bgColor = 'bg-red-300';
            break;

        default:
            $borderColor = 'border-sky-600';
            $bgColor = 'bg-sky-300';
            break;
    }
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} border-2 {{ $borderColor }} size-full font-semibold flex items-center rounded-xl">
        <button class="pl-2" @click="show = false;">
            ✕
        </button>
        <p class="w-full text-center">
            {{ session('message') }}
        </p>
    </div>
@endif
