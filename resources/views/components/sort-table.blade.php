@props(['sort', 'headers'])

<div>
    <div class="flex mb-5 space-x-3">
        <div class="">
            <x-label for="sortBy">
                {{ __('Sort By') }}
            </x-label>
            <x-select id="sortBy" wire:model.change="sortBy">
                @foreach (explode(', ', $sort) as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="">
            <x-label for="sort_by">
                {{ __('Order') }}
            </x-label>
            <x-select id="order" wire:model.change="sortType">
                <option value="desc">
                    DESC
                </option>
                <option value="asc">
                    ASC
                </option>
            </x-select>
        </div>
    </div>
    <div class="bg-white shadow rounded-lg p-5">
        <table class="w-full">
            <thead>
                <tr>
                    @foreach (explode(', ', $headers) as $item)
                      <th class="px-5 py-3 text-left">
                        {{ $item }}
                      </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
              {{ $slot }}
            </tbody>
        </table>
    </div>

    {{ $after }}
</div>
