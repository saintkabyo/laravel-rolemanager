<x-rolemanager::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RoleManager / Roles / Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-rolemanager::card>
                <form action="{{route('rolemanager.roles.store')}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <x-rolemanager::input-label for="name" value="Role Name" />
                            <x-rolemanager::text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="off" />
                            <x-rolemanager::input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="md:col-span-2">
                            @php
                                $prefix = null;
                                $prev_prefix = null;
                            @endphp
                            @foreach($permissions as $permission)
                                @php
                                    $temp = explode('-',$permission->name);
                                    $next_prefix = isset($permissions[$loop->index+1]) ? explode('-',$permissions[$loop->index+1]->name)[0] : null;
                                @endphp
                                @if($temp[0]!=$prefix)
                                <div class="flex justify-start space-x-4 border p-1 hover:bg-slate-200 text-sm">
                                    <div class="w-24">{{ucfirst($temp[0])}}</div>
                                @endif
                                    <div class="border-l pl-1">
                                        <label>
                                            <input type="checkbox" name="permission_ids[]" value="{{$permission->id}}"> 
                                            {{ucfirst($temp[1])}}
                                        </label>
                                    </div>
                                @if($temp[0]!=$next_prefix)
                                </div>
                                @endif
                                @php
                                    $prefix = $temp[0];
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-rolemanager::primary-button>Save</x-rolemanager::primary-button>
                    </div>
                </form>
            </x-rolemanager::card>
        </div>
    </div>
</x-rolemanager::layouts.app>