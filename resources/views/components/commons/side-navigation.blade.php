<div class="h-screen flex flex-col justify-between sticky top-0">
    <div class="flex flex-col gap-y-3">
        <a class="mt-3 px-5 h-[50px] w-fit flex items-center hover:bg-gray-900 rounded-full transition"
            href="{{ route('home') }}">
            <img class="size-[35px]" src="{{ asset('icon.svg') }}" alt="ロゴ画像">
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="{{ request()->routeIs('home') ? '2' : '1' }}" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                <span class="text-2xl {{ request()->routeIs('home') ? 'font-extrabold' : '' }}">ホーム</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
                <span class="text-2xl">話題を検索</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="{{ request()->routeIs('notifications') ? '2' : '1' }}" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
                <span class="text-2xl {{ request()->routeIs('notifications') ? 'font-extrabold' : '' }}">通知</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="{{ request()->routeIs('messages') ? '2' : '1' }}" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <polyline points="3 7 12 13 21 7" />
                </svg>
                <span class="text-2xl {{ request()->routeIs('messages') ? 'font-extrabold' : '' }}">メッセージ</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                    <rect x="9" y="3" width="6" height="4" rx="2" />
                    <line x1="9" y1="12" x2="9.01" y2="12" />
                    <line x1="13" y1="12" x2="15" y2="12" />
                    <line x1="9" y1="16" x2="9.01" y2="16" />
                    <line x1="13" y1="16" x2="15" y2="16" />
                </svg>
                <span class="text-2xl">リスト</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="{{ request()->routeIs('bookmarks') ? '2' : '1' }}"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
                <span class="text-2xl {{ request()->routeIs('bookmarks') ? 'font-extrabold' : '' }}">ブックマーク</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-whtie" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="text-2xl">コミュニティ</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="{{ request()->routeIs('profiles') ? '2' : '1' }}"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-2xl {{ request()->routeIs('profiles') ? 'font-extrabold' : '' }}">プロフィール</span>
            </div>
        </a>
        <a class="h-[50px]" href="#">
            <div class="h-full w-fit flex items-center gap-x-3 px-5 hover:bg-gray-900 rounded-full transition">
                <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="19" cy="12" r="1" />
                    <circle cx="5" cy="12" r="1" />
                </svg>
                <span class="text-2xl">もっと見る</span>
            </div>
        </a>
        <button
            class="w-[230px] h-[50px] bg-orange-500 rounded-full text-lg font-semibold hover:bg-orange-600 transition">ツイートする</button>
    </div>
    <div
        class="w-[260px] h-[65px] flex justify-between items-center px-5 mb-4 hover:bg-gray-900 hover:cursor-pointer rounded-full transition">
        <div class="flex items-center gap-x-2">
            <div class="size-[40px] flex justify-center items-center border rounded-full">IC</div>
            <div>
                <p class="font-bold">name</p>
                <span class="text-gray-500">@ユーザー名</span>
            </div>
        </div>
        <svg class="size-[20px] text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1" />
            <circle cx="19" cy="12" r="1" />
            <circle cx="5" cy="12" r="1" />
        </svg>
    </div>
</div>
