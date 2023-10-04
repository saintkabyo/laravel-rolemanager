<x-rolemanager::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            RoleManager / Users / Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-rolemanager::card>
                <form action="{{route('rolemanager.users.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-rolemanager::data.table :delete_modal="false">
                                <tbody>
                                    <x-rolemanager::data.tr>
                                        <x-rolemanager::data.th>Name</x-rolemanager::data.th>
                                        <x-rolemanager::data.td>{{$user->name}}</x-rolemanager::data.td>
                                    </x-rolemanager::data.tr>
                                    <x-rolemanager::data.tr>
                                        <x-rolemanager::data.th>Roles</x-rolemanager::data.th>
                                        <x-rolemanager::data.td>
                                        @foreach($roles as $role)
                                        <div class="p-1">
                                            <label>
                                                <input type="checkbox" name="role_ids[]" value="{{$role->id}}" {{$user->roles()->where('roles.id',$role->id)->exists() ? 'checked' : ''}}> 
                                                {{$role->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                        </x-rolemanager::data.td>
                                    </x-rolemanager::data.tr>
                                </tbody>
                            </x-rolemanager::data.table>
                            <div class="mt-4">
                                <x-rolemanager::primary-button>Save</x-rolemanager::primary-button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-rolemanager::card>
        </div>
    </div>
</x-rolemanager::layouts.app>