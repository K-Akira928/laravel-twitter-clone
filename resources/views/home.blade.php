<x-app-layout>
    <x-slot name="sideNav">
        <x-commons.side-navigation />
    </x-slot>
    <x-slot name="mainContents">
        <x-commons.main-contents>
            <x-slot name="contents">
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
