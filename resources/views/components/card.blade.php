@props(['title'=>'','description'=>'',])
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="w-full">
        <section>
            <header>
                <div class="flex justify-end space-x-4">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ $title }}
                    </h2>
                    @if(isset($actions))
                        {{$actions}}
                    @endif
                </div>
                <p class="mt-1 text-sm text-gray-600">
                    {{ $description }}
                </p>
            </header>
            <div class="mt-4">
                {{$slot}}
            </div>
        </section>
    </div>
</div>