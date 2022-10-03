@extends('layout')

@section('title', 'Sign In')

@section('content')
    <x-card class="mt-4 md:w-1/2 md:mx-auto">
        {{-- Header --}}
        <header class="mb-6 text-center">
            <h1 class="text-customDarkBlue font-bold text-3xl">Login</h1>
        </header>

        {{-- Form --}}
        <form action="/users/authenticate" method="POST">
            @csrf

            {{-- Username or Email --}}
            <div class="mb-6">
                <label for="login" class="block mb-1">Username or Email</label>
                <input id="login" class="border rounded-md p-2 w-full focus:outline-none" type="text" name="login" value="{{ old('login') }}" required>

                @error('login')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label for="password" class="block mb-1">Password</label>
                <input id="password" class="border rounded-md p-2 w-full focus:outline-none" type="password" name="password" value="{{ old('password') }}">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <button class="border rounded-md px-3 py-1 mb-6 border-customBlue text-white bg-customBlue duration-150 md:mb-0 hover:bg-customDarkBlue hover:border-customDarkBlue hover:ease-in" type="submit">
                    Login
                </button>
                
                <p>
                    Don't have an Account? 
                    <a href="/register" class="text-customBlue">Register</a>
                </p>
            </div>
        </form>
    </x-card>
@endsection