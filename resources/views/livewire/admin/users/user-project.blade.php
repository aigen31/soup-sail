<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Project') }} "{{ $this->project->name }}"
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h3 class="text-lg font-medium mb-2">Description</h3>

        <p>
            {{ $this->project->description }}
        </p>

        <div class="mt-5 mb-10">
            <a class="cursor-pointer flex space-x-3 items-center"
                href="{{ route('user-update-project', $this->project) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>

                <span class="text-gray-500 text-sm">Edit</span>
            </a>
        </div>

        <h3 class="text-lg font-medium mb-2">Tasks</h3>

        <x-sort-table sort="Create Date, Update Date, Name"
            headers="Task Name, Description, Created At, Updated At, Status">
            @if (count($this->tasks) !== 0)
                @foreach ($this->tasks as $item)
                    <tr>
                        <td class="px-5 py-3">
                            {{ $item->name }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->description }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->updated_at }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $item->status->name }}
                        </td>
                        <td>
                            <div class="flex space-x-3 justify-center">
                                <a class="cursor-pointer"
                                    href="{{ route('user-update-task', $item) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="px-5 py-3" colspan="5">
                        <p>There are no tasks here</p>

                        {{-- <x-a-button class="mt-5" href="{{ route('services') }}">
                          Create Task
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                              stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                      </x-a-button> --}}
                    </td>
                </tr>
            @endif

            <x-slot name="after">
                {{-- @if (count($this->tasks) !== 0)
                  <x-a-button class="mt-5" href="{{ route('services') }}">
                      Create Task
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="w-6 h-6 ml-2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                  </x-a-button>
              @endif --}}

                @if (count($this->tasks) !== 0)
                    <div class="mt-5">
                        {{ $this->tasks->links() }}
                    </div>
                @endif
            </x-slot>
        </x-sort-table>



    </div>
</div>
