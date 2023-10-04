<x-rolemanager::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RoleManager / Roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-rolemanager::card>
                <x-slot name="actions">
                    <x-rolemanager::search :url="route('rolemanager.roles.index')"/>
                    <x-rolemanager::primary-button as="a" href="{{route('rolemanager.roles.create')}}" class="">Create</x-rolemanager::primary-button>
                </x-slot>
                <x-rolemanager::data.table>
                    <thead>
                        <x-rolemanager::data.tr>
                            <x-rolemanager::data.th>ID</x-rolemanager::data.th>
                            <x-rolemanager::data.th>Name</x-rolemanager::data.th>
                            <x-rolemanager::data.th>Options</x-rolemanager::data.th>
                        </x-rolemanager::data.tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <x-rolemanager::data.tr>
                            <x-rolemanager::data.td>{{$role->id}}</x-rolemanager::data.td>
                            <x-rolemanager::data.td>{{$role->name}}</x-rolemanager::data.td>
                            <x-rolemanager::data.td>
                                <x-rolemanager::data.options :edit="route('rolemanager.roles.edit',$role->id)"/>
                            </x-rolemanager::data.td>
                        </x-rolemanager::data.tr>
                        @endforeach
                    </tbody>
                </x-rolemanager::data.table>
                <div class="mt-2">
                    {{$roles->links()}}
                </div>
            </x-rolemanager::card>
        </div>
    </div>
</x-rolemanager::layouts.app>