<x-app-layout>
    <x-slot name="sideNav">
        <x-commons.side-navigation />
    </x-slot>
    <x-slot name="mainContents">
        <x-commons.main-contents :user="$user">
            <x-slot name="contents">
                <div class="w-full h-[200px] relative">
                    @if ($user->header()->get()->isEmpty())
                        <img class="size-full object-cover" src="{{ asset('default_header_user.jpg') }}"
                            alt="デフォルトユーザーヘッダー">
                    @else
                        <img class="size-full object-cover"
                            src="{{ asset('storage/user_headers/' . $user->header()->get()->last()->filename) }}"
                            alt="ユーザーヘッダー">
                    @endif
                    @if ($user->icon()->get()->isEmpty())
                        <img class="absolute left-5 -translate-y-1/2 size-[133.5px] bg-white rounded-full border-4 border-black"
                            src="{{ asset('default_icon_user.png') }}" alt="">
                    @else
                        <img class="absolute left-5 -translate-y-1/2 size-[133.5px] object-cover rounded-full"
                            src="{{ asset('storage/user_icons/' . $user->icon()->get()->last()->filename) }}"
                            alt="ユーザーアイコン">
                    @endif
                </div>
                <div class="px-5 mb-5">
                    <div class="h-[70px] flex justify-end items-center">
                        @if ((int) request()->route('id') === Auth::id())
                            <button onclick="location.href='{{ route('users.edit', ['id' => $user->id]) }}'"
                                class="inline-block h-[35px] px-4 border rounded-full">プロフィールを編集</button>
                        @endif
                    </div>
                    <p class="text-2xl font-semibold">{{ $user->name }}</p>
                    <p class="text-gray-500">{{ '@' . $user->username }}</p>
                    <div class="flex items-center gap-x-4">
                        <span class="font-bold">1<span class="text-gray-500 ml-1">フォロー中</span></span>
                        <span class="font-bold">1<span class="text-gray-500 ml-1">フォロワー</span></span>
                    </div>
                </div>
                <div
                    class="grid grid-cols-4 grid-rows-[50px] place-content-center place-items-center text-gray-500 border-b border-gray-500">
                    <button class="size-full hover:bg-gray-500 hover:bg-opacity-50 transition">ツイート</button>
                    <button class="size-full hover:bg-gray-500 hover:bg-opacity-50 transition">リプライ</button>
                    <button class="size-full hover:bg-gray-500 hover:bg-opacity-50 transition">メディア</button>
                    <button class="size-full hover:bg-gray-500 hover:bg-opacity-50 transition">いいね</button>
                </div>
                @foreach ($user->tweets()->get() as $tweet)
                    <x-tweets.tweet-card :tweet="$tweet" />
                @endforeach
            </x-slot>
        </x-commons.main-contents>
    </x-slot>
    <x-slot name="sideContents">
        <x-commons.side-contents>
            <x-slot name="contents">
            </x-slot>
        </x-commons.side-contents>
    </x-slot>
</x-app-layout>
