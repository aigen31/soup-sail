<x-sort-table sort="Create Date, Update Date, Name" headers="Username, Created At, Updated At, Allowed Actions">
    @if (count($this->users) !== 0)
        @foreach ($this->users as $item)
            <tr>
                <td class="px-5 py-3">
                    {{-- <a href="{{ route('project', $item) }}" class="hover:text-green-500 transition-colors"> --}}
                    {{ $item->name }}
                    {{-- </a> --}}
                </td>
                <td class="px-5 py-3">
                    {{ $item->created_at }}
                </td>
                <td class="px-5 py-3">
                    {{ $item->updated_at }}
                </td>
                <td>
                    <div class="flex space-x-3 justify-center">
                        {{-- <a class="cursor-pointer" href="{{ route('update-user', $item) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a> --}}
                        @if ($item->role->privileges->wallet_access)
                            <a class="cursor-pointer" href="{{ route('user-transactions', $item) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        @endif
                        @if ($item->role->privileges->can_create_company)
                            <a class="cursor-pointer" href="{{ route('user-company', $item) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </a>
                        @endif
                        @if ($item->role->privileges->can_create_tasks)
                            <a class="cursor-pointer" href="{{ route('user-projects', $item) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="px-5 py-3" colspan="5">
                <p>There are no users here</p>

                {{-- <x-a-button class="mt-5" href="{{ route('create-project') }}">
                Create User
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </x-a-button> --}}
            </td>
        </tr>
    @endif

    <x-slot name="after">
        {{-- @if (count($this->users) !== 0)
        <x-a-button class="mt-5" href="{{ route('create-project') }}">
            Create Project
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </x-a-button>
    @endif --}}

        @if (count($this->users) !== 0)
            <div class="mt-5">
                {{ $this->users->links() }}
            </div>
        @endif
    </x-slot>
</x-sort-table>
