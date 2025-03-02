@extends('layout.layout')
@section('content')
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
            <span class="font-semibold text-primary text-xl">Role Permissions Management</span>
        </div>

        <div class="w-full p-4 flex flex-col gap-4">
            <div class="w-full overflow-x-auto">
                <form action="" method="POST">
                    <table class="w-full">
                        <thead>
                        <tr class="bg-primary/10">
                            <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Permission</th>
                            @foreach($roles as $role)
                                <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-center">{{ $role->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr class="hover:bg-secondary/10 transition ease-in duration-2000">
                                <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-bold text-sm">{{ $permission->name }}</td>
                                @foreach($roles as $role)
                                    <td class="border-[2px] border-secondary/40 px-4 py-2 text-center">
                                        <input type="checkbox" 
                                               name="permissions[{{ $role->id }}][{{ $permission->id }}]" 
                                               {{ $role->hasPermission($permission->id) ? 'checked' : '' }}
                                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <div class="w-full flex justify-end mt-4 gap-2">
                        <button type="submit"
                                class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">
                            Save Permissions
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection