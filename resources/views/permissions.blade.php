@extends('layout.layout')
@section('content')
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
            <span class="font-semibold text-primary text-xl">Permissions</span>
            <button type="submit" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Add Permission</button>
        </div>

        <div class="w-full p-4 flex flex-col gap-4">
            <div id="permissionFormDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20 hidden">
                <form action="" method="POST">

                    <div class="w-full grid xl:grid-cols-2 gap-2 p-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Permission Name <span class="text-danger">*</span></label>
                            <input type="text" name="permission_name" required placeholder="Enter Role name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Permission Description <span class="text-danger">*</span></label>
                            <textarea name="permission_description" required rows="2" placeholder="Enter permission description" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                        </div>
                    </div>
                    <div class="w-full flex justify-end px-4 pb-4 gap-2">
                        <button type="button" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Back</button>
                        <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Permission</button>
                    </div>
                </form>
            </div>






            <div class="w-full overflow-x-auto">

                <table class="w-full">
                    <thead>
                    <tr class="bg-primary/10">
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Sr. No.</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Permission</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Description</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Roles</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">1</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Create User</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can create users</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 5</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">2</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Edit User</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can modify user details</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 4</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">3</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Delete User</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can remove users from system</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 3</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">4</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">View Reports</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can access system reports</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 2</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">5</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Manage Settings</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can change system settings</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 1</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">6</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Export Data</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can export system data</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 3</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">7</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Import Data</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can import data into system</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 2</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">8</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Assign Roles</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can assign roles to users</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 4</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">9</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">Manage Backups</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can backup and restore system</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 2</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-secondary/10 cursor-pointer transition ease-in duration-2000">
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">10</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-bold text-sm">View Audit Logs</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">Can access system activity logs</td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <a href="{{route('roles')}}"  title="View Instruments" class="w-max bg-success/10 text-success h-6 px-1 flex justify-center items-center rounded-[3px] hover:bg-success hover:text-white transition ease-in duration-2000">
                                <span class="font-semibold"><i class="fa fa-eye"></i> 3</span>
                            </a>
                        </td>
                        <td class="border-[2px] border-secondary/40 px-4 py-1 text-ternary/80 font-medium text-sm">
                            <div class="flex gap-2 items-center">
                                <a href="#" onclick="document.getElementById('permissionFormDiv').classList.toggle('hidden')" title="Edit" class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>



                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-4">
                <div class="text-sm text-gray-600">Showing 1 to 10 of 50 entries</div>
                <div class="flex gap-2">
                    <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Previous</button>
                    <button class="text-xs bg-primary/30 px-3 py-1 rounded-full font-semibold border-[1px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection
