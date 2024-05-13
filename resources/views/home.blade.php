<x-app-layout>
    <x-slot name="sideNav">
        <x-commons.side-navigation />
    </x-slot>
    <x-slot name="mainContents">
        <x-commons.main-contents>
            <x-slot name="contents">
                <x-tweets.tweet-form />
                @foreach ($tweets as $tweet)
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
