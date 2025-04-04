<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Document' }}</title>
    @vite('resources\css\app.css', 'resources\js\app.js')
</head>
<body>
    <header class="border-b border-gray-200 bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
          <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
            <div>
              <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Blog Posts</h1>
      
              <p class="mt-1.5 text-sm text-gray-500">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, recusandae.
              </p>
            </div>
      
            <div class="flex items-center gap-4">
              <button
                class="inline-flex items-center justify-center gap-1.5 rounded-sm border border-gray-200 bg-white px-5 py-3 text-gray-900 transition hover:text-gray-700 focus:ring-3 focus:outline-hidden"
                type="button"
              >
                <a class="text-sm font-medium" href="{{route('posts.index')}}"> View Posts </a>
      
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="size-4"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                  />
                </svg>
              </button>
      
              <a
                class="inline-block rounded-sm bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:ring-3 focus:outline-hidden"
                type="button"
                 href="{{route('posts.create')}}"
              >
                Create Post
              </a>
            </div>
          </div>
        </div>
      </header>
    {{ $slot }}
</body>
</html>