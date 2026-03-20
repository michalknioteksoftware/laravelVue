<script setup>
import LifecycleCard from './components/LifecycleCard.vue';
import ReactivityComputedCard from './components/ReactivityComputedCard.vue';
import SingleComponentCounterCard from './components/SingleComponentCounterCard.vue';
import TodosWatchCard from './components/TodosWatchCard.vue';
</script>

<template>
    <div>
        <div class="row g-3">
            <div class="col-12 col-lg-6">
                <ReactivityComputedCard />
            </div>
            <div class="col-12 col-lg-6">
                <SingleComponentCounterCard />
            </div>
        </div>
        <TodosWatchCard />
        <LifecycleCard />
    </div>
</template>

