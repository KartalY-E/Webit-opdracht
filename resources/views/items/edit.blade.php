<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Updating Item {{ $item->name }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('items.update',$item) }}">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $item->name }}"
                                required autofocus />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" rows="10" cols="33" type="text"
                                name="description" value="{{ $item->description }}" required />
                        </div>

                        <!-- Starting Bid -->
                        <div class="mt-4">
                            <x-label for="starting_bid" :value="__('Starting bid')" />

                            <x-input id="starting_bid" class="block mt-1 w-full" type="number" inputmode="decimal"
                                name="starting_bid" value="{{ $item->starting_bid }}" required />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />

                            <x-input id="image" class="block mt-1 w-full" type="text" name="image" value="{{ $item->image }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                Update
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
