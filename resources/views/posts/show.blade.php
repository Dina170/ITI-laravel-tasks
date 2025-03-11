<x-layout title="View Post">
    <div class="overflow-x-auto flex justify-center gap-10 mt-3">
        <article class="max-w-1/2 min-w-75 ml-10 rounded-lg shadow-sm transition hover:shadow-lg">
          @if ($post->image)
          <img
              alt="Post Image"
              src="{{ asset('storage/' . $post->image) }}"
              class="h-56 w-full object-cover"
          />
          @endif
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">{{$post->title}}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            {{$post->description}}
          </p>
        </div>
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500">{{ $post->user->created_at->format('d M Y') }}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">{{$post->user->name}}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            {{$post->user->email}}
          </p>
        </div>
      </article>
      <div class="w-1/2 pr-10">
      <h2 class="text-2xl font-bold mb-4">Comments</h2>
      @include('comments.list', ['comments' => $post->comments])

      <h3 class="text-xl font-semibold mt-8 mb-4">Add a Comment</h3>
      @include('comments.create', ['post' => $post])
      </div>
    </div>
    @include('comments.edit-modal')
</x-layout>