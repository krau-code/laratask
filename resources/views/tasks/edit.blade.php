@extends('layout')

@section('title', 'Edit - '.$task->title)

@section('content')
    <a href="/tasks/{{ $task->id }}" class="text-white text-lg ml-1">
        <i class="fa-solid fa-arrow-left"></i> Go Back
    </a>

    <x-card class="mt-4">
        {{-- Header --}}
        <header class="mb-6">
            <h1 class="text-customDarkBlue font-bold text-3xl">Edit task</h1>
        </header>

        {{-- Form --}}
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-6">
                <label for="title" class="block mb-1">Task Title</label>
                <input class="border rounded-md p-2 w-full" type="text" name="title" placeholder="e.g. Doctor's Appointment" value="{{ $task->title }}">

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="title" class="block mb-1">
                    Description <span class="text-sm">(Optional)</span>
                </label>
                <textarea class="border rounded-md p-2 w-full" name="description" rows="4" placeholder="Additional details of the task">{{ $task->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Date & Time --}}
            <div class="mb-6">
                <label for="title" class="block mb-1">
                    Choose a date & time <span class="text-sm">(Optional)</span>
                </label>
                <input class="border rounded-md p-2 w-full" type="datetime-local" name="date_time" value="{{ $task->date_time }}">

                @error('date_time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="text-right">
                <button class="border rounded-md px-2 py-1 border-customDarkBlue text-customDarkBlue duration-150 hover:text-white hover:bg-customDarkBlue hover:ease-in" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </x-card>
@endsection