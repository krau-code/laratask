@props(['task'])

<div class="flex justify-between items-center bg-gray-200 mb-1.5 p-4">
    {{-- For Mobile --}}
    <div class="md:hidden">
        {{-- Title --}}
        <a href="/tasks/{{ $task->id }}" class="text-customDarkBlue hover:font-bold">
            @php
                $titleLength = Str::length($task->title);
            @endphp

            @if ($titleLength > 20)
                {{ Str::substr($task->title, 0, 20) }}...
            @else
                {{ $task->title }}
            @endif
        </a>

        {{-- Date & Time --}}
        @if ($task->date_time != null)
            <p class="text-customDarkBlue/80 text-[0.75rem]">
                {{ \Carbon\Carbon::parse($task->date_time)->format('M j Y, D h:i A') }}
            </p>
        @endif
    </div>

    {{-- For Large Devices --}}
    <div class="hidden md:block">
        {{-- Title --}}
        <a href="/tasks/{{ $task->id }}" class="text-customDarkBlue">
            {{ $task->title }}
        </a>

        {{-- Date & Time --}}
        @if ($task->date_time != null)
            <p class="text-customDarkBlue/80 text-[0.8rem]">
                {{ \Carbon\Carbon::parse($task->date_time)->format('F d, Y, l h:i A') }}
            </p>
        @endif
    </div>
    
    {{-- Buttons --}}
    <div class="text-lg flex">
        {{-- Edit --}}
        <div>
            <a href="/tasks/{{ $task->id }}/edit" class="text-customDarkBlue">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </div>

        {{-- Delete --}}
        <div>
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure you want to delete task {{ $task->title }}?')" class="text-red-500 ml-3" type="submit">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>