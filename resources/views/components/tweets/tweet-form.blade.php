@props(['reply' => false])

<form x-ref="tweetForm" x-data="{
    textareaValue: '',
    textareaHeightChange() {
        $refs.textarea.style.height = 'auto';
        $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
    },
    textareaWordCount() {
        return this.textareaValue.trim().length
    },
    images: [],
    setInputImage() {
        $refs.firstTweetImage.files = this.images[0]
        $refs.secondTweetImage.files = this.images[1]
        $refs.thirdTweetImage.files = this.images[2]
        $refs.fourthTweetImage.files = this.images[3]
    },
    setInputImageTwo() {
        console.log(this.images[0])
    }
}" class="w-full flex p-4 pb-2 border-b border-gray-500" method="POST"
    action="{{ route('tweets.store') }}" enctype="multipart/form-data">
    <div class="mr-3">
        @if (Auth::user()->icon()->get()->isEmpty())
            <img class="size-[40px] object-cover rounded-full" src="{{ asset('default_icon_user.png') }}"
                alt="デフォルトユーザーアイコン">
        @else
            <img class="size-[40px] object-cover rounded-full"
                src="{{ asset('storage/user_icons/' . Auth::user()->icon()->first()->filename) }}" alt="ユーザーアイコン">
        @endif
    </div>
    @csrf
    <div class="w-full flex flex-col">
        <div class="border-b border-gray-500">
            <textarea x-model="textareaValue" x-ref="textarea"
                x-on:input.change="
                textareaHeightChange();
                console.log(textareaWordCount())
                "
                class="w-full h-[44px] mb-5 flex items-center text-white bg-black text-2xl resize-none border-none focus:outline-none"
                placeholder={{ $reply ? '返信する' : 'いまどうしてる？' }} rows="1" name="content" id="content"></textarea>
            <template x-if="images.length">
                <div class="grid grid-flow-col gap-x-1">
                    <template x-for="(image, i) in images">
                        <div class="relative">
                            <img :class="images.length === 1 ? 'h-full w-full' : 'h-[275px]'" class=" object-cover"
                                :src="URL.createObjectURL(...image)" alt="" />
                            <button
                                @click="
                                images = images.filter((image) => image !== images[i]);
                                "
                                class="size-[30px] absolute right-2 top-2 bg-black rounded-full bg-opacity-30 hover:bg-opacity-70 transition"
                                type="button">✕</button>
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <div class="flex justify-between items-center pt-2">
            <div class="flex justify-between items-center">
                <button
                    class="size-[30px] flex justify-center items-center mr-2 hover:bg-orange-500 disabled:opacity-50 hover:bg-opacity-20 hover:cursor-pointer rounded-full transition"
                    type="button" @click="$refs.inputImages.click()" :disabled="images.length === 4">
                    <label class="hover:cursor-pointer">
                        <svg class="size-[20px] text-orange-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </label>
                </button>
                <input class="hidden" x-ref="inputImages" type="file"
                    @change="
                    images.push($refs.inputImages.files);
                ">
                <input class="hidden" x-ref="firstTweetImage" type="file" name="images[0]">
                <input class="hidden" x-ref="secondTweetImage" type="file" name="images[1]">
                <input class="hidden" x-ref="thirdTweetImage" type="file" name="images[2]">
                <input class="hidden" x-ref="fourthTweetImage" type="file" name="images[3]">
                <x-forms.error name="content" />
            </div>
            <div>
                <span :class="textareaWordCount() >= 140 ? 'text-red-500' : 'text-gray-400'" class="size-[30px]  mr-2"
                    x-text="textareaWordCount() + '/140'"></span>
                <button type="button" @click="setInputImage(); $refs.tweetForm.submit();"
                    class="bg-orange-500 hover:bg-orange-600 disabled:bg-orange-700 px-5 py-1 rounded-full font-extrabold"
                    :disabled="textareaWordCount() <= 0">{{ $reply ? '返信' : 'ツイートする' }}</button>
            </div>
        </div>
    </div>
</form>
