@extends('layout')

@section('title', 'Create an account')

@section('content')
    <x-card class="mt-4 md:w-1/2 md:mx-auto">
        {{-- Header --}}
        <header class="mb-6 text-center">
            <h1 class="text-customDarkBlue font-bold text-3xl">Registration</h1>
        </header>

        {{-- Form --}}
        <form action="/users" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-6">
                <label for="name" class="block mb-1">Name</label>
                <input class="border rounded-md p-2 w-full" type="text" name="name"  value="{{ old('name') }}">

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username --}}
            <div class="mb-6">
                <label for="username" class="block mb-1">Username</label>
                <input class="border rounded-md p-2 w-full" type="text" name="username"  value="{{ old('username') }}">

                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-6">
                <label for="email" class="block mb-1">Email</label>
                <input class="border rounded-md p-2 w-full" type="email" name="email"  value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label for="password" class="block mb-1">Password</label>
                <input class="border rounded-md p-2 w-full" type="password" name="password" value="{{ old('password') }}">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-1">Confirm Password</label>
                <input class="border rounded-md p-2 w-full" type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}">

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <button class="border rounded-md px-3 py-1 mb-6 border-customBlue text-white bg-customBlue duration-150 md:mb-0 hover:bg-customDarkBlue hover:border-customDarkBlue hover:ease-in" type="submit">
                    Register
                </button>
                
                <p>
                    Already have an Account? 
                    <a href="/login" class="text-customBlue">Login</a>
                </p>
            </div>
        </form>
    </x-card>
@endsection