@props(['name'])

@if ($errors->has($name))
    <span class=" text-sm text-red-500">※{{ $errors->first($name) }}</span>
@endif
