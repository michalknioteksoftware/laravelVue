<script setup>
const props = defineProps({
    value: {
        type: Number,
        required: true,
    },
});

defineEmits(['inc', 'dec', 'reset']);
</script>

<template>
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <button class="btn btn-outline-primary" type="button" @click="$emit('dec')">-</button>
        <div class="fs-3 fw-semibold">{{ props.value }}</div>
        <button class="btn btn-outline-primary" type="button" @click="$emit('inc')">+</button>
        <button class="btn btn-outline-secondary btn-sm ms-auto" type="button" @click="$emit('reset')">
            Reset
        </button>
    </div>
</template>

