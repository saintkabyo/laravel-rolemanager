@props(['delete_modal'=>true])
<table class="table-auto w-full">
    {{ $slot }}
    @if($delete_modal)
    <x-rolemanager::data.delete-modal/>
    @endif
</table>