<div>
    <div class="grid grid-cols-3 gap-5">
        @if (count($this->categories) !== 0)
            @foreach ($this->categories as $category)
                <div class="bg-white p-3 shadow relative flex space-x-3 items-center">
                    <a href="{{ route('services', $category) }}" class="absolute w-full h-full cursor-pointer"></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>

                    <p class="text-lg font-medium">
                        {{ $category->name }}
                    </p>
                </div>
            @endforeach
        @endif

        @if (!empty($this->services))
            @foreach ($this->services as $service)
                <div class="bg-white p-3 shadow relative flex space-x-3 items-center">
                    <a href="{{ route('service', $service) }}" class="absolute w-full h-full cursor-pointer"></a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <p class="text-lg font-medium">
                        {{ $service->name }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>
</div>
