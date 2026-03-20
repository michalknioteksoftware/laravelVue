<script setup>
import { computed, ref } from 'vue';
import BootstrapCard from './BootstrapCard.vue';

const count = ref(0);
const double = computed(() => count.value * 2);

function handleInc() {
    count.value++;
}

function handleDec() {
    count.value = Math.max(0, count.value - 1);
}

function handleReset() {
    count.value = 0;
}
</script>

<template>
    <BootstrapCard title="Single component pattern">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button class="btn btn-outline-primary" type="button" @click="handleDec">-</button>
            <div class="fs-3 fw-semibold">{{ count }}</div>
            <button class="btn btn-outline-primary" type="button" @click="handleInc">+</button>
            <button class="btn btn-outline-secondary btn-sm ms-auto" type="button" @click="handleReset">
                Reset
            </button>
        </div>

        <div class="mt-3">
            <div>
                <strong>Count</strong>: {{ count }}
            </div>
            <div>
                <strong>Double (computed)</strong>: {{ double }}
            </div>
        </div>
    </BootstrapCard>
</template>

