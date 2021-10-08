<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Comments') }}
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
                                <th class="px-4 py-3">Username</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Item</th>
                                <th class="px-4 py-3">Comment</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allComments as $comment)
                            <tr class="text-left">
                                <td>{{ $loop->index  }}</td>
                                <td>{{ $comment->username }}</td>
                                <td>{{ $comment->email  }}</td>
                                <td>{{ $comment->name  }}</td>
                                <td>{{ $comment->comment  }}</td>
                                <td>{{ $comment->created_at  }}</td>
                                {{-- {{  dd($allComments) }} --}}
                                <td>                                
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                    
                                        <x-button type="submit">Delete</x-button>
                                    </form>
                                </td>
                                
                            </tr>
                                
                            @empty
                            <tr>
                                <td>{{ __('No Comments Made') }}</td>
                            </tr>
                                
                            @endforelse
                            
            
                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $allComments->links() }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
