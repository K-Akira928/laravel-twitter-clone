@props(['images'])

@switch(count($images))
    @case(1)
        <div class="w-full">
            <img class="object-cover rounded-xl" src="{{ asset('storage/tweet_images/' . $images[0]->filename) }}" alt="ツイート画像1">
        </div>
    @break

    @case(2)
        <div class="grid grid-cols-2 grid-rows-[275px] gap-1">
            <img class="size-full object-cover rounded-s-xl" src="{{ asset('storage/tweet_images/' . $images[0]->filename) }}"
                alt="ツイート画像1">
            <img class="size-full object-cover rounded-e-xl" src="{{ asset('storage/tweet_images/' . $images[1]->filename) }}"
                alt="ツイート画像2">
        </div>
    @break

    @case(3)
        <div class="w-full grid grid-cols-2 grid-rows-[137.5px_137.5px] gap-1">
            <img class="row-span-2 size-full object-cover rounded-s-xl"
                src="{{ asset('storage/tweet_images/' . $images[0]->filename) }}" alt="ツイート画像1">
            <img class="size-full object-cover rounded-se-xl" src="{{ asset('storage/tweet_images/' . $images[1]->filename) }}"
                alt="ツイート画像2">
            <img class="size-full object-cover rounded-ee-xl" src="{{ asset('storage/tweet_images/' . $images[2]->filename) }}"
                alt="ツイート画像3">
        </div>
    @break

    @case(4)
        <div class="w-full grid grid-cols-2 grid-rows-[137.5px_137.5px] gap-1">
            <img class="size-full object-cover rounded-ss-xl" src="{{ asset('storage/tweet_images/' . $images[0]->filename) }}"
                alt="ツイート画像1">
            <img class="size-full object-cover rounded-se-xl" src="{{ asset('storage/tweet_images/' . $images[1]->filename) }}"
                alt="ツイート画像2">
            <img class="size-full object-cover rounded-es-xl" src="{{ asset('storage/tweet_images/' . $images[2]->filename) }}"
                alt="ツイート画像3">
            <img class="size-full object-cover rounded-ee-xl" src="{{ asset('storage/tweet_images/' . $images[3]->filename) }}"
                alt="ツイート画像4">
        </div>
    @break

    @default
@endswitch
