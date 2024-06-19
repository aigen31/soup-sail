<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Notifications') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @foreach ($this->notifications as $item)
            <div class="px-4 py-5 bg-white shadow mb-2">
                <h2 class="text-xl font-medium mb-2">{{ $item->data['title'] }}</h2>
                <p class="text-sm">{{ $item->data['message'] }}. <a class="text-green-500"
                        href="{{ route('user-update-task', [
                            'taskId' => $item->data['taskId'],
                        ]) }}">Show
                        task</a></p>
            </div>
        @endforeach


        <x-section-border />
    </div>
</div>
