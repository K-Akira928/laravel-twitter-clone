@props(['value', 'name', 'type' => 'text', 'initial' => null, 'old' => false])

<div @click="toggle" @click.away="clickAway" x-data="{
    focus: $refs.input.value,
    toggle() {
        this.focus = true;
        $nextTick(() => $refs.input.focus());
    },
    clickAway() {
        if (!$refs.input.value) {
            this.focus = false
        }
    }
}"
    class="relative h-[58px] border border-gray-500 rounded-lg flex flex-col justify-end focus:outline focus:outline-sky-30"
    :class="focus && 'outline outline-2 outline-sky-400'">
    <label class="absolute transition-all"
        :class="focus ? 'top-1 left-2 text-sm text-sky-400' :
            'top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gray-500 text-xl'"
        for="{{ $name }}">{{ $value }}</label>
    <input x-ref="input" class="w-full bg-inherit outline-none p-2 0 focus:bg-inherit" type="{{ $type }}"
        id="{{ $name }}" name="{{ $name }}"
        @if ($old) value="{{ is_null($initial) ? old($name) : $initial }}" @endif>
</div>
