<form action="{{ route('comments.store') }}" method="POST" class="w-full max-w-lg">
    @csrf
    <div class="form-group mb-4">
        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Comment:</label>
        <textarea name="content" id="content" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
    </div>
    <input type="hidden" name="commentable_id" value="{{ $post->id }}">
    <input type="hidden" name="commentable_type" value="App\Models\Post">
    <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Comment</button>
</form>