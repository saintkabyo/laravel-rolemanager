@props(['url'])
<form action="{{$url}}">
    <x-text-input name="search" type="text" class="mt-1 block w-full" :value="request('search')" autocomplete="off" placeholder="Search"/>
</form>