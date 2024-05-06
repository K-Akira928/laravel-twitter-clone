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

    <div class="grid place-items-center h-[560px] overflow-y-scroll">
        <div class="w-[440px]">
            <h2 class="text-4xl font-semibold mb-6">アカウントを作成</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid gap-y-8">
                    <div class="relative">
                        <x-forms.input-label value="メールアドレス" name="email" old={{ true }} />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="email" />
                        </div>
                    </div>

                    <div class="relative">
                        <x-forms.input-label value="名前" name="name" old={{ true }} />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="name" />
                        </div>
                    </div>

                    <div class="relative">
                        <x-forms.input-label value="ユーザー名" name="username" old={{ true }} />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="username" />
                        </div>
                    </div>

                    <div x-data="{
                        display: {
                            day: 31,
                            year: new Date().getFullYear(),
                        },
                        selectBirth() {
                            const year = $refs.selectYear?.value || 12
                            const month = $refs.selectMonth?.value || 31
                            this.display.day = new Date(year, month, 0).getDate()
                        },
                    }">
                        <p class="font-bold">生年月日</p>
                        <span
                            class="text-sm text-gray-500">この情報は公開されません。このアカウントをビジネス、ペットなどに使う場合でも、ご自身の年齢を確認してください。</span>
                        <div class="flex justify-between mt-2">
                            <div class="w-5/12 h-[58px] relative border border-gray-500 rounded-lg">
                                <label class="absolute left-2 top-1 z-10" for="birthMonth">月</label>
                                <select class="absolute size-full left-0 bg-inherit text-lg flex items-end"
                                    @change="selectBirth" x-ref="selectMonth" name="birthMonth" id="birthMonth">
                                    <option hidden></option>
                                    <template x-for="(_v, i) in [...Array(12)]">
                                        <option class="bg-black" x-text="i + 1"
                                            :selected="i + 1 === Number({{ old('birthMonth') }})"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="w-3/12 h-[58px] relative border border-gray-500 rounded-lg">
                                <label class="absolute left-2 top-1 z-10" for="birthDay">日</label>
                                <select class="absolute size-full left-0 bg-inherit text-lg flex items-end"
                                    name="birthDay" id="birthDay">
                                    <option hidden></option>
                                    <template x-for="(_v, i) in [...Array(display.day)]">
                                        <option class="bg-black" x-text="i + 1"
                                            :selected="i + 1 === Number({{ old('birthDay') }})"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="w-3/12 h-[58px] relative border border-gray-500 rounded-lg">
                                <label class="absolute left-2 top-1 z-10" for="birthYear">年</label>
                                <select class="absolute size-full left-0 bg-inherit text-lg flex items-end"
                                    @change="selectBirth" x-ref="selectYear" name="birthYear" id="birthYear">
                                    <option hidden></option>
                                    <template x-for="(_v, i) in [...Array(120)]">
                                        <option class="bg-black" x-text="display.year - (i + 1)"
                                            :selected="display.year - (i + 1) === Number({{ old('birthYear') }})">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <x-forms.error name="birthday" />
                    </div>

                    <div class="relative">
                        <x-forms.input-label value="パスワード" name="password" type="password" />
                        <div class="absolute -bottom-5">
                            <x-forms.error name="password" />
                        </div>
                    </div>

                    <x-forms.input-label value="パスワード(確認用)" name="password_confirmation" type="password" />

                    <button type="submit"
                        class="w-full font-semibold bg-sky-400 h-[40px] rounded-full">アカウントを作成</button>
                </div>
            </form>

            <p class="w-full text-center text-gray-500 mt-4">アカウントをお持ちの場合は<a class="text-sky-500 hover:underline"
                    href="{{ route('login') }}">ログイン</a>
            </p>
        </div>
    </div>

</x-guest-layout>
