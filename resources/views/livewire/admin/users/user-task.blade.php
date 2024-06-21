<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Task Information') }}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" x-data="{
        specialistList: [],
        show: false,
        find() {
            if (!this.show) {
                this.show = true
            }
            $wire.getSpecialists().then(result => {
                this.specialistList = result;
            });
            console.log($wire.getSpecialists())
        },
        invite(id) {
            $wire.inviteSpecialist(id)
        },
    }">
        <x-form-section on="x-on:submit.prevent">
            <x-slot name="title">
                {{ $this->task->name }}
            </x-slot>

            <x-slot name="description">
                {{ $this->task->description }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-12">
                    <x-label for="type" value="{{ __('Choose specialist type') }}" />
                    <div class="flex items-center space-x-2">
                        <x-select wire:model='specialistType'>
                            @foreach ($this->specialistTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-select>
                        <x-button x-on:click="find">
                            {{ __('Find') }}
                        </x-button>
                    </div>
                    <x-input-error for="type" class="mt-2" />

                    <div class="mt-2" x-cloak x-show="show">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 text-left">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="item in specialistList" :key="item.id">
                                    <tr>
                                        <td class="px-5 py-3 text-left">
                                            <span x-text="item.name"></span>
                                        </td>
                                        <td class="px-5 py-3 text-left">
                                            <x-button x-on:click="invite(item.id)">
                                                Invite
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                                </svg>
                                            </x-button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-slot>

            <x-slot name="actions" class="">
                <x-action-message class="me-3" on="invited">
                    {{ __('Invite is success.') }}
                </x-action-message>
                <div class="space-x-3">
                    <x-button wire:click="inviteAll">
                        {{ __('Invite All') }}
                    </x-button>
                </div>
            </x-slot>
        </x-form-section>

        <x-section-border />
    </div>
</div>
