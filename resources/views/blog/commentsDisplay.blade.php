@foreach($comments as $comment)
    <div class="display-comment @if($comment->parent_id != null) ml-10 @endif">
        <strong class="font-bold ml-10">{{ $comment->user->name }}</strong>
        <p class="text-gray-700 ml-10">{{ $comment->body }}</p>
        <details class="bg-transparent shadow rounded group mb-4 ml-10">
            <summary class="list-none flex flex-wrap items-center cursor-pointer
            focus-visible:outline-none focus-visible:ring focus-visible:ring-pink-500
            rounded group-open:rounded-b-none group-open:z-[1] relative
            ">
              <h3 class="flex flex-1 p-4 font-semibold"><a class="text-blue-500 font-bold" id="reply">Reply</a></h3>
              <div class="flex w-10 items-center justify-center">
                <div class="border-8 border-transparent border-l-gray-600 ml-2
                group-open:rotate-90 transition-transform origin-left
                "></div>
              </div>
            </summary>
            <div class="p-4">
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
            </div>
          </details>
      
        @include('blog.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach


