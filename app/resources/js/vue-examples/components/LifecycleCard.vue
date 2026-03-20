<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import BootstrapCard from './BootstrapCard.vue';

// Demonstrate lifecycle hooks.
const now = ref(new Date());
let timer = null;

onMounted(() => {
    timer = setInterval(() => (now.value = new Date()), 1000);
});

onUnmounted(() => {
    if (timer) clearInterval(timer);
});
</script>

<template>
    <BootstrapCard title="Lifecycle">
        <div class="text-body-secondary">
            Current time (updates every second): <strong>{{ now.toLocaleTimeString() }}</strong>
        </div>
        <div class="mt-2">
            Open DevTools Console to see lifecycle activity (mounted/unmounted).
        </div>
    </BootstrapCard>
</template>

