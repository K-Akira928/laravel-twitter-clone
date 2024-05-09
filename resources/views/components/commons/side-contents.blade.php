@if (request()->routeIs('home'))
    <div class="bg-black sticky top-0 py-1">
        <div class="h-[45px] px-5 flex items-center bg-gray-500 bg-opacity-50 rounded-full hover:cursor-text">
            <svg class="size-[20px] text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="1"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="10" cy="10" r="7" />
                <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
            <span class="text-gray-500 ml-4">検索</span>
        </div>
    </div>
@endif

<div class="sticky top-0 -z-10">
    {{ $contents }}
</div>
