<x-layout title="View Post">
    <div class="overflow-x-auto flex justify-center">
        <article class="min-w-75 rounded-lg shadow-sm transition hover:shadow-lg">
          
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500">{{$post->created_at}}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">{{$post->title}}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            {{$post->description}}
          </p>
        </div>
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500">{{$post->user->created_at}}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">{{$post->user->name}}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            {{$post->user->email}}
          </p>
        </div>
      </article>
    
    </div>
    </x-layout>