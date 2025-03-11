<script setup>

import { Link } from '@inertiajs/vue3';
import Layout from './Layout.vue';

defineProps({
    posts: {
        type: Object,
    },
});

const confirmDelete = (id) => {
    if (confirm('Are you sure you want to delete this post?')) {
        axios.delete(route('posts.destroy', id))
            .then(() => {
                window.location.reload();
            });
    }
};
</script>

<template>
    <layout>
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-3/4 divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">ID</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title Slug</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Create At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <tr v-for="post in posts.data" :key="post.id">
                        <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ post.id }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.title }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.slug }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.user?.name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ new
                            Date(post.created_at).toLocaleDateString('en-GB') }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <Link :href="route('posts.show', post.id)"
                                class="inline-block rounded-md bg-indigo-600 px-4 py-2 mr-2 text-xs font-medium text-white hover:bg-indigo-700">
                            View</Link>
                            <Link :href="route('posts.edit', post.id)"
                                class="inline-block rounded-md bg-pink-600 px-4 py-2 mr-2 text-xs font-medium text-white hover:bg-pink-700">
                            Update</Link>
                            <form method="POST" class="inline-block" :action="route('posts.destroy', post.id)"
                                @submit.prevent="confirmDelete(post.id)">
                                <button type="submit"
                                    class="inline-block rounded-md bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>


<style></style>