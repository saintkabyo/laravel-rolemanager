<x-rolemanager::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RoleManager / Permissions /Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-rolemanager::card>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <form action="{{route('rolemanager.permissions.store')}}" method="POST">
                        @csrf
                        <div>
                            <x-rolemanager::input-label for="name" value="Permission Name" />
                            <x-rolemanager::text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="off" />
                            <x-rolemanager::input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-4">
                            <x-rolemanager::primary-button>Save</x-rolemanager::primary-button>
                        </div>
                    </form>
                </div>
            </x-rolemanager::card>
        </div>
    </div>
</x-rolemanager::layouts.app>