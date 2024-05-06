<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="bg-black text-white h-screen">
        <div
            class="
            max-w-[550px] p-6 mx-auto grid grid-cols-1 gap-y-4
            lg:max-w-full lg:h-full lg:gap-0 lg:place-items-center lg:grid-cols-2">
            <div class="size-12 lg:size-[500px]">
                <img src="{{ asset('icon.svg') }}" alt="アイコン画像">
            </div>
            <div>
                <div class="opacity-90">
                    <h1 class="text-7xl font-extrabold">すべての話題が、ここに。</h1>
                    <h3 class="text-3xl mt-10 font-semibold">今すぐ参加しましょう。</h3>
                </div>
                <nav class="grid gap-y-4 place-items-start text-black mt-8">
                    <button class="w-[300px] h-[40px] bg-white rounded-full">
                        <span class="font-extrabold">Googleで登録</span>
                    </button>
                    <button class="w-[300px] h-[40px] bg-white rounded-full">
                        <span class="font-extrabold">Appleのアカウントで登録</span>
                    </button>
                    <div
                        class="
                        w-[300px] text-center flex items-center
                        before:flex-grow before:h-[1px] before:bg-white before:mr-3 before:opacity-30
                        after:flex-grow after:h-[1px] after:bg-white after:ml-3 after:opacity-30
                        ">
                        <span class="text-white">または
                        </span>
                    </div>
                    <button onclick="location.href='{{ route('register') }}'"
                        class="w-[300px] h-[40px] bg-sky-400 rounded-full">
                        <span class="font-extrabold text-white text-lg">アカウントを作成</span></button>
                    <div class="w-[300px]">
                        <span
                            class="text-sm text-gray-500">アカウントを登録することにより、利用規約とプライバシーポリシー（Cookieの使用を含む）に同意したとみなされます。</span>
                    </div>
                    <div class="w-[300px] flex flex-col gap-y-3">
                        <p class="text-white font-semibold text-xl">アカウントをお持ちの場合</p>
                        <button onclick="location.href='{{ route('login') }}'"
                            class="w-full h-[40px] border border-gray-500 text-sky-500 rounded-full font-bold text-lg">ログイン</button>
                    </div>
                </nav>
            </div>
        </div>
    </main>
</body>

</html>
