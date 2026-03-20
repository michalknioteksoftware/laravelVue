<script setup>
import { computed, ref } from 'vue';
import BootstrapCard from './BootstrapCard.vue';
import CounterWidget from './CounterWidget.vue';

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
    <BootstrapCard title="Reactivity + Computed">
        <CounterWidget :value="count" @inc="handleInc" @dec="handleDec" @reset="handleReset" />
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

