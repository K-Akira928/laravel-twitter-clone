<form x-data="{
    textareaValue: '',
    textareaHeightChange() {
        $refs.textarea.style.height = 'auto';
        $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
    },
    textareaWordCount() {
        return this.textareaValue.trim().length
    }
}" class="w-full flex p-4 pb-2 border-b border-gray-500" method="POST"
    action="{{ route('tweets.store') }}">
    <div class="mr-3">
        <div class="size-[40px] flex justify-center items-center border rounded-full">IC</div>
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
                placeholder="いまどうしてる？" rows="1" name="content" id="content"></textarea>
        </div>
        <div class="flex justify-between items-center pt-2">
            <div class="flex justify-between items-center">
                <button
                    class="size-[30px] flex justify-center items-center mr-2 hover:bg-orange-500 hover:bg-opacity-20 hover:cursor-pointer rounded-full transition"
                    type="button" @click="$refs.inputImages.click()">
                    <label class="hover:cursor-pointer" for="images">
                        <svg class="size-[20px] text-orange-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </label>
                </button>
                <input x-ref="inputImages" class="hidden" name="images" type="file">
                <x-forms.error name="content" />
            </div>
            <div>
                <span :class="textareaWordCount() >= 140 ? 'text-red-500' : 'text-gray-400'" class="size-[30px]  mr-2"
                    x-text="textareaWordCount() + '/140'"></span>
                <button
                    class="bg-orange-500 hover:bg-orange-600 disabled:bg-orange-700 px-5 py-1 rounded-full font-extrabold"
                    :disabled="textareaWordCount() <= 0">ツイートする</button>
            </div>
        </div>
    </div>
</form>
