@extends('superadmin.layout.layout')
@section('content')
<div class="w-full border-[1px] border-t-[4px] border-primary/20 border-t-primary bg-white flex gap-2 flex-col shadow-lg shadow-gray-300">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="bg-primary/10 px-4 py-2 border-b-[2px] border-b-primary/20 flex justify-between">
        <span class="font-semibold text-primary text-xl">Create Instrument Category</span>
    </div>

    <div id="formDiv" class="w-full border-b-[2px] border-b-ternary/10 shadow-lg shadow-ternary/20">
           <form action="{{ route('superadmin.storeinstrumentcategory') }}" method="POST" enctype="multipart/form-data">
                        @csrf
           
            <div class="w-full grid xl:grid-cols-2 gap-2 p-4">
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="category_name" required placeholder="Enter category name" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"/>
                            @if ($errors->has('category_name'))
                            <span class="text-red-500">{{ $errors->first('category_name') }}</span>
                        @endif
                </div>
                <div class="w-full flex flex-col gap-1">
                    <label class="font-semibold text-primary">Category Description </label>
                    <textarea name="category_description" required rows="2" placeholder="Enter category description" class="px-2 py-2 w-full text-sm font-medium bg-transparent placeholder-primary/70 border-[2px] border-primary/40 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] focus:ring-0 focus:outline-none focus:border-primary transition ease-in duration-2000"></textarea>
                </div>
            </div>
            <div class="w-full flex justify-end px-4 pb-4 gap-2">
                <a href="{{route('dashboard')}}" class="text-sm bg-primary/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-primary/80 text-primary hover:text-white hover:bg-primary hover:border-ternary/30 transition ease-in duration-2000">Back</a>
                <button type="submit" class="text-sm bg-success/30 px-4 py-1 rounded-[3px] rounded-tr-[8px] rounded-bl-[8px] font-semibold border-[2px] border-success/90 text-ternary hover:text-white hover:bg-success hover:border-ternary/30 transition ease-in duration-2000">Create Category</button>
            </div>
        </form>
    </div>
</div>
@endsection


