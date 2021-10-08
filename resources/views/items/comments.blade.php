<div class="p-8">
    <form method="POST" action="{{ route('comments.store') }}">        
        @error('comment')
        <div class="alert alert-danger">
            A comment is max 255 characters
        </div>
        @enderror
        
        @csrf
        @method('POST')

    
        <!-- Comment -->
        <div>
            <x-label for="comment" :value="__('Comment')" />

            <x-textarea name='comment' id="comment" class="block mt-1 w-full" cols='10' rows='10'/>

            <input type="hidden" id="item" name="item" value="{{ $item->slug }}">
            
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Comment
            </x-button>
        </div>
    </form>

    @forelse ($item->comments->reverse()->take(10) as $comment)
    <div>
        <span class="font-bold">{{ $comment->user->username }}</span>
        <p>{{ $comment->comment }}</p>
    </div>
    @empty
    @endforelse
</div>