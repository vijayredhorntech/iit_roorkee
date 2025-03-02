@extends('layout.layout')
@section('content')
    <div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">
        <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20">
            <span class="font-semibold text-primary text-xl">Instrument Usage Session</span>
        </div>

        <div class="w-full p-4">
            <form action="" method="POST" class="w-full flex flex-col gap-4" enctype="multipart/form-data">
                <div class="w-full grid xl:grid-cols-2 gap-4">
                    <div class="w-full flex flex-col gap-1">
                        <label class="font-semibold text-primary">Instrument</label>
                        <div class="px-2 py-2 w-full text-sm font-medium bg-gray-50 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px]">
                            {{ $booking->instrument->name }}
                        </div>
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label class="font-semibold text-primary">Session Type</label>
                        <div class="px-2 py-2 w-full text-sm font-medium bg-gray-50 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px]">
                            {{ $isCheckIn ? 'Check-In' : 'Check-Out' }}
                        </div>
                    </div>
                </div>

                <!-- Pre-use Checklist for Check-out -->
                @if(!$isCheckIn)
                <div class="w-full border-[2px] border-primary/20 rounded-[3px] p-4">
                    <h3 class="font-semibold text-primary text-lg mb-4">Pre-use Checklist</h3>
                    <div class="grid xl:grid-cols-2 gap-4">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="checklist[power_supply]" required
                                   class="w-4 h-4 text-primary border-primary/40 rounded focus:ring-primary">
                            <label class="text-sm font-medium text-ternary">Power supply and connections checked</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="checklist[calibration]" required
                                   class="w-4 h-4 text-primary border-primary/40 rounded focus:ring-primary">
                            <label class="text-sm font-medium text-ternary">Calibration status verified</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="checklist[safety_equipment]" required
                                   class="w-4 h-4 text-primary border-primary/40 rounded focus:ring-primary">
                            <label class="text-sm font-medium text-ternary">Safety equipment available and functional</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="checklist[workspace]" required
                                   class="w-4 h-4 text-primary border-primary/40 rounded focus:ring-primary">
                            <label class="text-sm font-medium text-ternary">Workspace clean and organized</label>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Condition Report -->
                <div class="w-full border-[2px] border-primary/20 rounded-[3px] p-4">
                    <h3 class="font-semibold text-primary text-lg mb-4">Condition Report</h3>
                    <div class="grid xl:grid-cols-2 gap-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Instrument Condition <span class="text-danger">*</span></label>
                            <select name="condition" required class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                <option value="">Select Condition</option>
                                <option value="excellent">Excellent</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                            </select>
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Images <span class="text-danger">*</span></label>
                            <input type="file" name="condition_images[]" required multiple accept="image/*"
                                   class="px-2 py-2 w-full text-sm font-medium bg-transparent file:mr-4 file:py-2 file:px-4 file:rounded-[3px] file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20"/>
                        </div>

                        <div class="w-full xl:col-span-2 flex flex-col gap-1">
                            <label class="font-semibold text-primary">Notes <span class="text-danger">*</span></label>
                            <textarea name="condition_notes" required rows="3" placeholder="Describe the current condition, any visible issues, or concerns"
                                      class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Usage Documentation for Check-in -->
                @if($isCheckIn)
                <div class="w-full border-[2px] border-primary/20 rounded-[3px] p-4">
                    <h3 class="font-semibold text-primary text-lg mb-4">Usage Documentation</h3>
                    <div class="grid xl:grid-cols-2 gap-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Results Achieved <span class="text-danger">*</span></label>
                            <textarea name="results" required rows="3" placeholder="Describe the results or outcomes of your session"
                                      class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label class="font-semibold text-primary">Issues Encountered</label>
                            <textarea name="issues" rows="3" placeholder="Describe any issues or difficulties encountered"
                                      class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Emergency Report -->
                <div class="w-full border-[2px] border-danger/20 rounded-[3px] p-4">
                    <h3 class="font-semibold text-danger text-lg mb-4">Emergency Report</h3>
                    <div class="flex items-center gap-2 mb-4">
                        <input type="checkbox" name="has_emergency" id="hasEmergency"
                               class="w-4 h-4 text-danger border-danger/40 rounded focus:ring-danger">
                        <label for="hasEmergency" class="text-sm font-medium text-danger">Report an emergency or critical issue</label>
                    </div>
                    <div id="emergencyForm" class="hidden">
                        <div class="grid xl:grid-cols-2 gap-4">
                            <div class="w-full flex flex-col gap-1">
                                <label class="font-semibold text-primary">Emergency Type <span class="text-danger">*</span></label>
                                <select name="emergency_type" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                    <option value="">Select Type</option>
                                    <option value="malfunction">Equipment Malfunction</option>
                                    <option value="damage">Physical Damage</option>
                                    <option value="safety">Safety Concern</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label class="font-semibold text-primary">Severity Level <span class="text-danger">*</span></label>
                                <select name="emergency_severity" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000">
                                    <option value="">Select Severity</option>
                                    <option value="low">Low - Can continue operation</option>
                                    <option value="medium">Medium - Limited operation possible</option>
                                    <option value="high">High - Operation affected</option>
                                    <option value="critical">Critical - Immediate shutdown required</option>
                                </select>
                            </div>
                            <div class="w-full xl:col-span-2 flex flex-col gap-1">
                                <label class="font-semibold text-primary">Emergency Description <span class="text-danger">*</span></label>
                                <textarea name="emergency_description" rows="3" placeholder="Provide detailed description of the emergency or issue"
                                          class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-end gap-2">
                    <a href="{{ route('bookings') }}"
                       class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">
                        Cancel
                    </a>
                    <button type="submit"
                            class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">
                        {{ $isCheckIn ? 'Complete Check-in' : 'Start Session' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('hasEmergency').addEventListener('change', function() {
            document.getElementById('emergencyForm').classList.toggle('hidden');
        });
    </script>
@endsection