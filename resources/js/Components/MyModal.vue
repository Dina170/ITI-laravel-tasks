<script setup>
defineProps({
    show: {
        type: Boolean,
        default: false,
    }
});

const emit = defineEmits(['close']);
function close() {
    emit('close');
}
</script>

<template>
    <div v-if="show"
        class="border border-gray-800 fixed inset-0 flex items-center justify-center bg-black/75 shadow bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 relative w-1/2">
            <h2 class="text-lg font-semibold text-gray-800 m-2 mb-4">Post Details</h2>
            <button @click="close" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                &times;
            </button>
            <slot></slot>
        </div>
    </div>
</template>


<style></style>