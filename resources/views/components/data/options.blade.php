@props(['info'=>null,'edit'=>null,'delete'=>null,'pdf'=>null])
<div>
    @if($info)
        <a href="{{$info}}" class="border p-1 rounded-sm text-xs bg-blue-500 text-white hover:bg-blue-700">Info.</a>
    @endif
    @if($edit)
        <a href="{{$edit}}" class="border p-1 rounded-sm text-xs bg-slate-500 text-white hover:bg-slate-700">Edit</a>
    @endif
    @if($delete)
        <button type="button" x-data="" x-on:click="$dispatch('open-delete-modal',@js($delete))" class="border p-1 rounded-sm text-xs bg-red-500 text-white hover:bg-red-700">Del.</button>
    @endif
    @if($pdf)
        <a href="{{$pdf}}" target="_blank" class="border p-1 rounded-sm text-xs bg-slate-500 text-white hover:bg-slate-700">PDF</a>
    @endif
</div>