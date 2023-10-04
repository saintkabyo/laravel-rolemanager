<x-rolemanager::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RoleManager / Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-rolemanager::card>
                <x-slot name="actions">
                    <x-rolemanager::search :url="route('rolemanager.users.index')"/>
                </x-slot>
                <x-rolemanager::data.table>
                    <thead>
                        <x-rolemanager::data.tr>
                            <x-rolemanager::data.th>ID</x-rolemanager::data.th>
                            <x-rolemanager::data.th>Name</x-rolemanager::data.th>
                            <x-rolemanager::data.th>Roles</x-rolemanager::data.th>
                            <x-rolemanager::data.th>Options</x-rolemanager::data.th>
                        </x-rolemanager::data.tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <x-rolemanager::data.tr>
                            <x-rolemanager::data.td>{{$user->id}}</x-rolemanager::data.td>
                            <x-rolemanager::data.td>{{$user->name}}</x-rolemanager::data.td>
                            <x-rolemanager::data.td>
                                @foreach($user->roles as $role)
                                    <span class="bg-slate-300 p-1 rounded">{{$role->name}}</span>
                                @endforeach
                            </x-rolemanager::data.td>
                            <x-rolemanager::data.td>
                                <x-rolemanager::data.options :edit="route('rolemanager.users.edit',$user->id)"/>
                            </x-rolemanager::data.td>
                        </x-rolemanager::data.tr>
                        @endforeach
                    </tbody>
                </x-rolemanager::data.table>
                <div class="mt-2">
                    {{$users->links()}}
                </div>
            </x-rolemanager::card>
        </div>
    </div>
</x-rolemanager::layouts.app>