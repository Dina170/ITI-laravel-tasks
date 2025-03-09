<x-layout title="Blog Posts">
    <div class="overflow-x-auto flex justify-center">
      <table class="min-w-3/4 divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right">
          <tr>
            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">ID</th>
            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Create At</th>
            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
            <th class="px-4 py-2"></th>
          </tr>
        </thead>
    
        <tbody class="divide-y divide-gray-200">
          @foreach ($posts as $post) 
          <tr>
            <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{$post->id}}</td>
            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{$post->title}}</td>
            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{$post->user?->name}}</td>
            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{$post->created_at}}</td>
            <td class="px-4 py-2 whitespace-nowrap">
              <a href="{{route('posts.show', $post['id'])}}"
                class="inline-block rounded-sm bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
              >View</a>
              <a href="{{route('posts.edit', $post['id'])}}"
                class="inline-block rounded-sm bg-pink-600 px-4 py-2 text-xs font-medium text-white hover:bg-pink-700"
              >Update</a>
              <a href="{{route('posts.show', $post['id'])}}"
                class="inline-block rounded-sm bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700"
              >Delete</a>
            </td>
          </tr>
          @endforeach
    
        </tbody>
      </table>
    </div>
    </x-layout>