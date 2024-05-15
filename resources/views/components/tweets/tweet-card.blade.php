@props(['tweet'])

<div class="w-full relative pt-4 pb-2 px-4 flex flex-col border-b border-gray-500">
    <button onclick="location.href='{{ route('tweets.show', ['id' => $tweet->id]) }}'" type="button"
        class="absolute size-full hover:bg-gray-500 hover:bg-opacity-20 transition top-0 left-0"></button>
    <div class="flex">
        @if (empty($tweet->user->icon))
            <img class="size-[40px] object-cover rounded-full" src="{{ asset('default_icon_user.png') }}"
                alt="デフォルトユーザーアイコン">
        @else
            <img class="size-[40px] object-cover rounded-full"
                src="{{ asset('storage/user_icons/' . $tweet->user->icon[0]->filename) }}" alt="ユーザーアイコン">
        @endif
        <div class="w-full ml-3">
            <div class="w-full flex justify-between">
                <div>
                    <a href="#"
                        class="font-bold text-lg relative z-10 hover:underline">{{ $tweet->user->name }}</a>
                    <span
                        class="text-gray-500 ml-2 relative z-10 hover:underline hover:cursor-pointer">{{ '@' . $tweet->user->username }}</span>
                </div>
                <div x-data="{
                    open: false
                }" @click="open = true"
                    class="size-[28px] relative z-10 justify-center flex items-center rounded-full hover:cursor-pointer hover:bg-gray-500 hover:bg-opacity-30 transition">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="19" cy="12" r="1" />
                        <circle cx="5" cy="12" r="1" />
                    </svg>
                    <div x-show="open" @click.away="open = false"
                        class="absolute z-10 p-2 bg-black top-0 right-0 w-[200px] border rounded-lg">
                        @if ($tweet->user->id === Auth::id())
                            <form method="POST" action="{{ route('tweets.destroy', ['id' => $tweet->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 font-bold w-full">削除</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <p class="whitespace-break-spaces">{{ $tweet->content }}</p>
            @if (!$tweet->images->isEmpty())
                <x-tweets.tweet-images :images="$tweet->images" />
            @endif
        </div>
    </div>
    <div class="w-full mt-2 ml-2 flex items-center before:size-[40px]">
        <div class="w-full flex justify-between">
            <button class="size-[35px] z-10 flex justify-center items-center hover:bg-sky-900 rounded-full transition"
                type="button">
                <svg class="size-[18.75px] text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
            </button>
            <button class="size-[35px] z-10 flex justify-center items-center hover:bg-green-900 rounded-full transition"
                type="button">
                <svg class="size-[18.75px] text-gray-500" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3" />
                    <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3-3l3-3" />
                </svg>
            </button>
            <button class="size-[35px] z-10 flex justify-center items-center hover:bg-pink-900 rounded-full transition"
                type="button">
                <svg class="size-[18.75px] text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                </svg>
            </button>
            <button class="size-[35px] z-10 flex justify-center items-center hover:bg-sky-900 rounded-full transition"
                type="button">
                <svg class="size-[18.75px] text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
            </button>
        </div>
    </div>
</div>
