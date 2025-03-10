<x-layout title="Create Post">
  <section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-10 sm:px-6 lg:px-8">
          @if ($errors->any())
          <div role="alert" class="max-w-3xl mx-auto mb-4 rounded-sm border-s-4 border-red-500 bg-red-50 p-4">
              <strong class="block font-medium text-red-800"> Something went wrong </strong>
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach        
              </ul>
            </div>
            @endif
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
                      @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
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
    </x-layout>