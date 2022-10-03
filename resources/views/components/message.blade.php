@if(session()->has('message'))
    <div 
        {{-- Alpine JS Framework --}}
        
        {{-- Declare Data --}}
        x-data="{show: true}"

        {{-- Run When Element is Initialized --}}
        x-init="setTimeout(() => show = false, 3000)"

        {{-- Toggle Visibility --}}
        x-show="show"

        class="fixed w-full text-center top-0 py-4 bg-customDarkBlue text-white md:w-1/2 md:top-2 md:left-1/2 md:transform md:-translate-x-1/2 md:rounded-md"
    >
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif