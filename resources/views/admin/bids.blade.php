<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Bids') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Item</th>
                                <th class="px-4 py-3">Username</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Bid amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allBids as $bid)
                                <tr class="text-left">
                                    <td>{{ $loop->index  }}</td>
                                    <td>{{ $bid->name  }}</td>
                                    <td>{{ $bid->username  }}</td>
                                    <td>{{ $bid->email  }}</td>
                                    <td>{{ $bid->amount  }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td>{{ __('No Bids Made') }}</td>
                            </tr>
                            
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $allBids->links() }}
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
