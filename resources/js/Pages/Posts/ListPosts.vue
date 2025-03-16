<script setup>

import MyModal from '@/Components/MyModal.vue';
import { Link } from '@inertiajs/vue3';
import Layout from './Layout.vue';
import { ref } from 'vue';

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

const viewPost = (id) => {
    axios.get(route('posts.show_json', id))
        .then((response) => {
            modalPost.value = response.data;
            showModal.value = true;
        });
};

const showModal = ref(false);
const modalPost = ref(null);
</script>

<template>
    <layout>
        <div class="flex justify-center">
            <table class="divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">ID</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title Slug</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Create At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
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
                            <button @click="viewPost(post.id)"
                                class="inline-block rounded-md bg-indigo-600 px-4 py-2 mr-2 text-xs font-medium text-white hover:bg-indigo-700">
                                View Ajax</button>
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
        <MyModal :show="showModal" @close="showModal = false">
            <template v-if="modalPost">
                <article class="max-w-1/2 min-w-75 rounded-lg shadow-sm transition hover:shadow-lg">
                    <img v-if="modalPost.image" :alt="modalPost.title" :src="`/storage/${modalPost.image}`"
                        class="h-56 w-full object-cover" />
                    <div class="bg-white p-4 sm:p-6">
                        <time :datetime="modalPost.created_at" class="block text-xs text-gray-500">{{ new
                            Date(modalPost.created_at).toLocaleDateString() }}</time>
                        <a href="#">
                            <h3 class="mt-0.5 text-lg text-gray-900">{{ modalPost.title }}</h3>
                        </a>
                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                            {{ modalPost.description }}
                        </p>
                    </div>
                    <div class="bg-white p-4 sm:p-6">
                        <time :datetime="modalPost.user.created_at" class="block text-xs text-gray-500">{{ new
                            Date(modalPost.user.created_at).toLocaleDateString() }}</time>
                        <a href="#">
                            <h3 class="mt-0.5 text-lg text-gray-900">{{ modalPost.user.name }}</h3>
                        </a>
                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                            {{ modalPost.user.email }}
                        </p>
                    </div>
                </article>
            </template>
        </MyModal>
    </layout>
</template>


<style></style>