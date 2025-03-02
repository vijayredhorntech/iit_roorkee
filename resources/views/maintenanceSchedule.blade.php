@extends('layout.layout')
@section('content')
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
            <span class="font-semibold text-primary text-xl">Maintenance Schedule</span>
            <button type="button" onclick="document.getElementById('scheduleFormDiv').classList.toggle('hidden')"
                    class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">
                Schedule Maintenance
            </button>
        </div>

        <div class="w-full p-4 flex flex-col gap-4">
            <div id="scheduleFormDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20 hidden">
                <form action="" method="POST">
                    <div class="w-full grid xl:grid-cols-3 gap-2 p-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Instrument <span class="text-danger">*</span></label>
                            <select name="instrument_id" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                <option value="">Select Instrument</option>
                                @foreach($instruments as $instrument)
                                    <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Maintenance Type <span class="text-danger">*</span></label>
                            <select name="maintenance_type" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                <option value="">Select Type</option>
                                <option value="routine">Routine</option>
                                <option value="calibration">Calibration</option>
                                <option value="repair">Repair</option>
                                <option value="upgrade">Upgrade</option>
                            </select>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Service Engineer</label>
                            <select name="engineer_id" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                <option value="">Select Engineer</option>
                                @foreach($engineers as $engineer)
                                    <option value="{{ $engineer->id }}">{{ $engineer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Start Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="start_date" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">End Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="end_date" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Priority</label>
                            <select name="priority" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="w-full xl:col-span-3 flex flex-col gap-1">
                            <label class="font-semibold text-primary">Description <span class="text-danger">*</span></label>
                            <textarea name="description" required rows="3" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                        </div>
                    </div>
                    <div class="w-full flex justify-end px-4 pb-4 gap-2">
                        <button type="button" onclick="document.getElementById('scheduleFormDiv').classList.toggle('hidden')"
                                class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">
                            Cancel
                        </button>
                        <button type="submit"
                                class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">
                            Schedule
                        </button>
                    </div>
                </form>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="bg-primary/10">
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Instrument</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Type</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Engineer</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Start Date</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">End Date</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Status</th>
                        <th class="border-[2px] border-secondary/40 px-4 py-2 text-primary font-bold text-sm text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr class="hover:bg-secondary/10 transition ease-in duration-2000">
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-bold text-sm">{{ $schedule->instrument->name }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{ ucfirst($schedule->maintenance_type) }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{ $schedule->engineer->name ?? 'Not Assigned' }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{ $schedule->start_date }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">{{ $schedule->end_date }}</td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                                <span class="px-2 py-1 rounded text-xs font-semibold
                                    @if($schedule->status === 'completed') bg-success/20 text-success
                                    @elseif($schedule->status === 'in_progress') bg-warning/20 text-warning
                                    @elseif($schedule->status === 'cancelled') bg-danger/20 text-danger
                                    @else bg-primary/20 text-primary
                                    @endif">
                                    {{ ucfirst(str_replace('_', ' ', $schedule->status)) }}
                                </span>
                            </td>
                            <td class="border-[2px] border-secondary/40 px-4 py-2 text-ternary/80 font-medium text-sm">
                                <div class="flex gap-2 items-center">
                                    <a href="#" title="View Details"
                                       class="bg-primary/10 text-primary h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-primary hover:text-white transition ease-in duration-2000">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" title="Edit"
                                       class="bg-warning/10 text-warning h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-warning hover:text-white transition ease-in duration-2000">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    @if($schedule->status === 'scheduled')
                                        <button type="button" title="Cancel"
                                                class="bg-danger/10 text-danger h-6 w-8 flex justify-center items-center rounded-[3px] hover:bg-danger hover:text-white transition ease-in duration-2000">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection