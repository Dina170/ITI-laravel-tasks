<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources\css\app.css')
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
                <a class="text-sm font-medium" href="{{route('posts.index')}}"> View Website </a>
      
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


{{-- <div class="overflow-x-auto flex justify-center"> --}}
<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
          <form action="/posts" method="POST" class="space-y-4">
            @csrf
            <div>
              <label class="sr-only" for="name">Title</label>
              <input
                class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                placeholder="Title"
                type="text"
                name="title"
              />
            </div>
  
            
            <div>
                <label class="sr-only" for="message">Description</label>
                
                <textarea
                class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                placeholder="Description"
                rows="8"
                name="description"
                ></textarea>
            </div>
            <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                <select name="posted_by" id="" class="border border-gray-200 rounded p-2">
                    <option value="dina">dina</option>
                    <option value="test">test</option>
                </select>
            </div>
            
            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
    </div>
  </section>
{{-- </div> --}}
</body>
</html>

