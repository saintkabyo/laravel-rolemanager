@if(session('success'))
<div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 alerts" role="alert">
  <p class="font-bold">Success</p>
  <p class="text-sm">{{session('success')}}</p>
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 alerts" role="alert">
  <p class="font-bold">Error</p>
  <p class="text-sm">{{session('error')}}</p>
</div>
@endif

@if(session('warning'))
<div class="bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 px-4 py-3 alerts" role="alert">
  <p class="font-bold">Warning</p>
  <p class="text-sm">{{session('warning')}}</p>
</div>
@endif

@if(session('info'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 alerts" role="alert">
  <p class="font-bold">Info</p>
  <p class="text-sm">{{session('info')}}</p>
</div>
@endif

<script>
    setTimeout(function() {document.querySelectorAll(".alerts").forEach(el => el.remove());},5000);
</script>