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
            const post = response.data;
            console.log(post);

            modalContent.value = `
            
            <article class="max-w-1/2 min-w-75 rounded-lg shadow-sm transition hover:shadow-lg">
          <img v-if="${post.image}"
              alt="Post Image"
              src="storage/${post.image}"
              class="h-56 w-full object-cover"
          />
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500">${new Date(post.created_at).toLocaleDateString()}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">${post.title}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            ${post.description}
          </p>
        </div>
        <div class="bg-white p-4 sm:p-6">
          <time datetime="2022-10-10" class="block text-xs text-gray-500"> ${new Date(post.user.created_at).toLocaleDateString()}</time>
      
          <a href="#">
            <h3 class="mt-0.5 text-lg text-gray-900">${post.user.name}</h3>
          </a>
      
          <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            ${post.user.email}
          </p>
        </div>
      </article>           
            `;
            showModal.value = true;
        });
};

const showModal = ref(false);
const modalContent = ref('');
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
            <div v-html="modalContent"></div>
        </MyModal>
    </layout>
</template>


<style></style>