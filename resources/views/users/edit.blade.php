<x-app-layout>
    <x-slot name="sideNav">
        <x-commons.side-navigation />
    </x-slot>
    <x-slot name="mainContents">
        <x-commons.main-contents :user="$user">
            <x-slot name="contents">
                <form class="grid grid-cols-[100%] place-content-center" enctype="multipart/form-data"
                    action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" x-data="{
                        refClick(ref) {
                                ref.click()
                            },
                            changeHeader() {
                                $refs.headerImage.src = URL.createObjectURL($refs.inputHeader.files[0])
                            },
                            changeIcon() {
                                $refs.iconImage.src = URL.createObjectURL($refs.inputIcon.files[0])
                            }
                    }">
                    @csrf
                    @method('PUT')

                    <div class="w-full relative mb-24">
                        <div class="relative w-full h-[200px]">
                            @if (Auth::user()->header()->get()->isEmpty())
                                <img x-ref="headerImage" class="size-full object-cover"
                                    src="{{ asset('default_header_user.jpg') }}" alt="デフォルトユーザーヘッダー">
                            @else
                                <img x-ref="headerImage" class="size-full object-cover"
                                    src="{{ asset('storage/user_headers/' . Auth::user()->header()->get()->last()->filename) }}"
                                    alt="ユーザーヘッダー">
                            @endif
                            <button @click="refClick($refs.inputHeader)" type="button"
                                class="size-[90px] bg-gray-500 bg-opacity-50 rounded-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <label class="flex justify-center items-center relative -z-10" for="header">
                                    <svg class="size-[60%] text-white" width="24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="13" r="3" />
                                        <path
                                            d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h2m9 7v7a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                        <line x1="15" y1="6" x2="21" y2="6" />
                                        <line x1="18" y1="3" x2="18" y2="9" />
                                    </svg>
                                </label>
                            </button>
                            <input @change="changeHeader" x-ref="inputHeader" class="hidden" name="header"
                                type="file">
                        </div>
                        <div class="relative">
                            <div class="absolute left-5 -translate-y-1/2 size-[133.5px]">
                                @if (Auth::user()->icon()->get()->isEmpty())
                                    <img x-ref="iconImage" class="size-full bg-white rounded-full border-4 border-black"
                                        src="{{ asset('default_icon_user.png') }}" alt="">
                                @else
                                    <img x-ref="iconImage" class="size-[133.5px] object-cover rounded-full"
                                        src="{{ asset('storage/user_icons/' . Auth::user()->icon()->get()->last()->filename) }}"
                                        alt="ユーザーアイコン">
                                @endif
                                <button @click="refClick($refs.inputIcon)" @change="" type="button"
                                    class="size-[70px] bg-gray-500 bg-opacity-50 rounded-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    <label class="flex justify-center items-center relative -z-10" for="header">
                                        <svg class="size-[60%] text-white" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="13" r="3" />
                                            <path
                                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h2m9 7v7a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                            <line x1="15" y1="6" x2="21" y2="6" />
                                            <line x1="18" y1="3" x2="18" y2="9" />
                                        </svg>
                                    </label>
                                </button>
                                <input @change="changeIcon" x-ref="inputIcon" class="hidden" name="icon"
                                    type="file">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-[80%] place-content-center gap-y-10">
                        <div class="relative">
                            <x-forms.input-label value="名前" name="name" :initial="$user->name"
                                old={{ true }} />
                            <div class="absolute -bottom-5">
                                <x-forms.error name="name" />
                            </div>
                        </div>

                        <button type="submit" class="w-full font-semibold bg-sky-400 h-[40px] rounded-full">更新</button>
                    </div>
                </form>
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
