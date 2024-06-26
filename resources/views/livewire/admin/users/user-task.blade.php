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
                this.specialistList = result
            });
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
                            @foreach ($this->specialistTypes as $specialistType)
                                <option value="{{ $specialistType->id }}">{{ $specialistType->name }}</option>
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
                                <template x-for="user in specialistList" :key="user.id">
                                    <tr>
                                        <td class="px-5 py-3 text-left">
                                            <span x-text="user.name"></span>
                                        </td>
                                        <td class="px-5 py-3 text-left">
                                            <button x-data="{
                                                invitedStatus: false,
                                                init() {
                                                    $wire.isInvited(user.id).then(result => {
                                                        this.invitedStatus = result.original.isInvited
                                                    })
                                                },
                                                invite(id) {
                                                    $wire.invite(id).then(result => {
                                                        this.invitedStatus = true
                                                    });
                                                },
                                            }" :disabled="invitedStatus && 'false'"
                                                x-on:click="invite(user.id);" :class="invitedStatus && 'bg-green-500'"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                                <span x-text="invitedStatus ? 'Invited' : 'Invite'"></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-slot>

            <x-slot name="actions" class="">
                <x-action-message class="me-3" on="invite-error">
                    {{ __('All specialists already invited.') }}
                </x-action-message>
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
