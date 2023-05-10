@foreach($comments as $comment)
    <div class="display-comment @if($comment->parent_id != null) ml-10 @endif">
        <strong class="font-bold">{{ $comment->user->name }}</strong>
        <p class="text-gray-700">{{ $comment->body }}</p>
        <a href="#" class="text-blue-500 font-bold" id="reply">Reply</a>
        <form method="post" action="{{ route('comment.store') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <input type="text" name="body" class="border rounded-lg px-3 py-2 w-full" placeholder="Write a reply..." />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Reply</button>
            </div>
        </form>
        @include('blog.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
