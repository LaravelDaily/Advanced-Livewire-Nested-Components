<div class="mb-4 mt-4 ml-{{ $level*4 ?? '0' }}">
    [ {{ $comment->rating }} ]
    <b>{{ $comment->user->name }}
    [{{ $comment->created_at->format('Y-m-d H:i') }}]:</b>
    {{ $comment->comment_text }}
    @auth
    <a wire:click.prevent="vote(1)" href="#" class="underline">+1</a>
    <a wire:click.prevent="vote(-1)" href="#" class="underline">-1</a>
    @endauth

    @foreach ($comment->comments->sortByDesc('rating') as $comment)
        @livewire('comment-show', [$comment, $level+1], key($comment->id))
    @endforeach
</div>
