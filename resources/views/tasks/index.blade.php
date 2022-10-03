@extends('layout')

@section('title', 'My Tasks')

@section('content')
    {{-- Name --}}
    <p class="capitalize text-white text-right text-lg mb-1 md:hidden">
        Hi, {{ auth()->user()->name }}!
    </p>

    @include('partials._search')
    
    <x-card>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-customDarkBlue font-bold">My Tasks</h1>
    
            <a href="/tasks/add" class="border rounded-md px-2 py-1 border-customDarkBlue text-customDarkBlue duration-150 hover:text-white hover:bg-customDarkBlue hover:ease-in">Add Task</a>
        </div>

        {{-- Rows --}}
        @unless (count($tasks) == 0)
            @foreach ($tasks as $task)
                <x-task-row :task="$task" />
            @endforeach    
        @else
            <p class="text-center text-customDarkBlue mt-10">
                No Task Found 

                @unless (count($search) == 0)
                    @php
                        $searchWord = implode(" ", $search);
                    @endphp
                    for "{{ $searchWord }}"
                @endunless
            </p>
        @endunless

        {{-- Pagination --}}
        <div class="mt-6 px-4">
            {{ $tasks->links() }}
        </div>
    </x-card>
@endsection