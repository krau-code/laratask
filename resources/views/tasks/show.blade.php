@extends('layout')

@section('title', $task->title)

@section('content')
    <a href="/tasks" class="text-white text-lg ml-1">
        <i class="fa-solid fa-arrow-left"></i> Go Back
    </a>

    <x-card class="grid divide-y space-y-6 mt-4">
        {{-- Header --}}
        <header>
            {{-- Title --}}
            <p class="text-customDarkBlue text-2xl font-bold mb-1">
                {{ $task->title }}
            </p>

            {{-- Date & Time --}}
            @if ($task->date_time != null)
                {{-- For Mobile --}}
                <p class="text-customDarkBlue/80 text-sm md:hidden">
                    {{ \Carbon\Carbon::parse($task->date_time)->format('M j Y, D h:i A') }}
                </p>
        
                {{-- For Large Devices --}}
                <p class="hidden text-customDarkBlue/80 text-sm md:block">
                    {{ \Carbon\Carbon::parse($task->date_time)->format('F d, Y, l h:i A') }}
                </p>
            @endif
        </header>
        
        {{-- Description --}}
        @if (!empty($task->description))
            <p class="text-customDarkBlue pt-4 indent-8">
                {{ $task->description }}
            </p>
        @endif
            
        {{-- Buttons --}}
        <div class="text-l text-right pt-6 flex justify-end items-center">
            {{-- Edit --}}
            <div>
                <a href="/tasks/{{ $task->id }}/edit" class="border rounded-md px-2 py-1 border-customDarkBlue text-customDarkBlue duration-150 hover:text-white hover:bg-customDarkBlue hover:ease-in">Edit</a>
            </div>
    
            {{-- Delete --}}
            <div>
                <form action="/tasks/{{ $task->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="border rounded-md px-2 py-1 border-red-500 text-red-500 ml-2 duration-150 hover:text-white hover:bg-red-500 hover:ease-in" type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-card>
@endsection