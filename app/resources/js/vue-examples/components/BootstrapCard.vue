<script setup>
defineProps({
    title: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h5 mb-3">{{ title }}</h2>
            <slot />
        </div>
    </div>
</template>

