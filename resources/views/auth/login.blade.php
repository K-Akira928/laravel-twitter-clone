<x-guest-layout>
    <div x-data="{
        show: $refs.flashContainer.children.length - 2,
    }" class="relative">
        <div class="w-full h-[45px] absolute flex justify-center items-center rounded-xl"
            :class="show ? 'animate-scale-in-center' : 'animate-scale-out-center'" x-ref="flashContainer">
            <x-flash-message status="session('status')" />
        </div>
    </div>

    <div class="h-[50px]">
        <div class="size-[30px] mx-auto">
            <img src="{{ asset('icon.svg') }}" alt="ロゴ画像">
        </div>
    </div>

    <div class="grid place-items-center">
        <div class="max-w-[300px] md:w-[300px]">
            <nav>
                <h2 class="text-3xl font-semibold mb-6">Xにログイン</h2>
                <div class="text-black">
                    <button class="w-[300px] h-[40px] bg-white rounded-full mb-6">
                        <span class="font-extrabold">Googleで登録</span>
                    </button>
                    <button class="w-[300px] h-[40px] bg-white rounded-full mb-3">
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
                </div>
            </nav>
            <form class="mt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="grid gap-y-8">
                    <div class="relative">
                        <x-forms.input-label value="メールアドレス" name="email" old={{ true }} />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="email" />
                        </div>
                    </div>

                    <div class="relative">
                        <x-forms.input-label value="パスワード" name="password" />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="password" />
                        </div>
                    </div>

                    <button type="submit" class="w-full font-semibold bg-sky-400 h-[40px] rounded-full">ログイン</button>
                </div>
            </form>
            <button
                class="w-full h-[35px] border border-gray-500 rounded-full font-semibold mt-6">パスワードを忘れた場合はこちら</button>
            <p class="w-full text-center text-gray-500 mt-4">アカウントをお持ちでない方は<a class="text-sky-500 hover:underline"
                    href="{{ route('register') }}">登録</a>
            </p>
        </div>
    </div>
</x-guest-layout>
