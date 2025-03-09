<div id="editCommentModal" class="fixed inset-0 flex items-center justify-center bg-black/75 shadow bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-2xl font-bold mb-4">Edit Comment</h2>
        <form id="editCommentForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="editContent" class="block text-gray-700 text-sm font-bold mb-2">Comment:</label>
                <textarea name="content" id="editContent" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Comment</button>
            <button type="button" class="btn btn-secondary bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="closeEditModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(button) {
        const commentId = button.getAttribute('data-comment-id');
        const commentContent = button.getAttribute('data-comment-content');
        document.getElementById('editContent').value = commentContent;
        document.getElementById('editCommentForm').action = `/comments/${commentId}`;
        document.getElementById('editCommentModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editCommentModal').classList.add('hidden');
    }

</script>
