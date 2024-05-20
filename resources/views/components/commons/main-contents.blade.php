@props(['user' => ''])

@if (request()->routeIs('home'))
    <div
        class="h-[53px] z-50 flex justify-between text-gray-500 border-b sticky top-0 bg-black bg-opacity-80 backdrop-blur-[1px]">
        <div
            class="w-[45%] flex justify-center items-center hover:bg-gray-900 hover:bg-opacity-40 hover:cursor-pointer transition">
            <span class="text-lg">
                おすすめ
            </span>
        </div>
        <div
            class="w-[45%] flex justify-center items-center hover:bg-gray-900 hover:bg-opacity-40 hover:cursor-pointer transition">
            <span class="text-lg">
                フォロー中
            </span>
        </div>
        <div class="w-[10%] flex justify-center items-center">
            <div class="p-2 rounded-full hover:bg-gray-900 hover:cursor-pointer transition">
                <svg class="size-[20px] text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </div>
        </div>
    </div>
@endif
@if (request()->routeIs('tweets.show'))
    <div class="h-[53px] z-50 flex items-center gap-4">
        <a class="ml-5" href="{{ route('home') }}">
            <svg class="h-8 w-8" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="11" y2="18" />
                <line x1="5" y1="12" x2="11" y2="6" />
            </svg></a>
        <span class="font-semibold text-2xl">ツイートする</span>
    </div>
@endif
@if (request()->routeIs('users.show'))
    <div class="h-[53px] z-50 flex items-center gap-4">
        <a class="ml-5" href="{{ route('home') }}">
            <svg class="h-8 w-8" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="11" y2="18" />
                <line x1="5" y1="12" x2="11" y2="6" />
            </svg></a>
        <div>
            <span class="font-semibold text-2xl">{{ $user->name }}</span>
        </div>
    </div>
@endif
<div>
    {{ $contents }}
</div>
