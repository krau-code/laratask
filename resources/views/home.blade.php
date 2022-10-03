@extends('layout')

@section('title', 'Task with us!')

@section('content')
    {{-- Text --}}
    <p class="text-customDarkBlue font-bold tracking-widest text-center md:text-left">TASK MADE EASY FOR
        {{-- Text Highlight --}}
        <span class="highlight">
            <span class="handwriting text-4xl font-normal">everyone</span>
        </span>
    </p>
            
    {{-- Images --}}
    <div class="md:flex md:justify-between">
        <img class="w-11/12 mx-auto mt-6 md:w-5/12 md:mx-0" src="{{ asset('images/hero-text.png') }}" alt="task with us">

        <img class="hidden mx-auto mt-4 md:block md:w-5/12 md:mx-0" src="{{ asset('images/illustration.svg') }}" alt="illustration">
    </div>
@endsection