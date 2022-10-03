<form action="/tasks/">
    <div class="flex items-center h-14 gap-4 px-4 bg-white rounded-md mb-4">
        {{-- Search Icon --}}
        <div>
            <i class="fa fa-search text-gray-400 hover:text-gray-500"></i>
        </div>

        {{-- Search Field --}}
        <input type="text" name="search" class="bg-white h-14 w-full focus:outline-none" placeholder="Search Task..." />
        
        {{-- Search Button --}}
        <div>
            <button type="submit" class="border rounded-md px-3 py-1 border-customBlue text-white bg-customBlue duration-150 md:mb-0 hover:bg-customDarkBlue hover:border-customDarkBlue hover:ease-in">
                Search
            </button>
        </div>
    </div>
</form>