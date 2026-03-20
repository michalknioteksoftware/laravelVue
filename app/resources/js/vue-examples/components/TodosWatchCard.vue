<script setup>
import { computed, ref, watch } from 'vue';
import BootstrapCard from './BootstrapCard.vue';

const todos = ref([
    { id: 1, text: 'Learn reactivity', done: false },
    { id: 2, text: 'Try computed values', done: true },
    { id: 3, text: 'Watch input and filter a list', done: false },
]);

const newTodoText = ref('');
const search = ref('');
const statusMessage = ref('Waiting for interactions...');

const filteredTodos = computed(() => {
    const q = search.value.trim().toLowerCase();
    if (!q) return todos.value;
    return todos.value.filter((t) => t.text.toLowerCase().includes(q));
});

watch(
    search,
    (value) => {
        statusMessage.value = value.trim()
            ? `Filtering todos by "${value.trim()}".`
            : 'Showing all todos.';
    },
    { immediate: true },
);

function addTodo() {
    const text = newTodoText.value.trim();
    if (!text) return;

    const nextId = Math.max(...todos.value.map((t) => t.id)) + 1;
    todos.value = [{ id: nextId, text, done: false }, ...todos.value];
    newTodoText.value = '';
}

function removeTodo(id) {
    todos.value = todos.value.filter((t) => t.id !== id);
}
</script>

<template>
    <BootstrapCard title="Watch + List Rendering">
        <div class="row g-2 align-items-end">
            <div class="col-12 col-md-5">
                <label class="form-label" for="todoSearch">Search</label>
                <input
                    id="todoSearch"
                    v-model="search"
                    class="form-control"
                    placeholder="Type to filter todos..."
                />
            </div>
            <div class="col-12 col-md-7">
                <div class="alert alert-secondary mb-0" role="status" aria-live="polite">
                    {{ statusMessage }}
                </div>
            </div>
        </div>

        <div class="mt-3">
            <label class="form-label" for="newTodo">New todo</label>
            <input
                id="newTodo"
                v-model="newTodoText"
                class="form-control"
                placeholder="Add something Vue can render..."
                @keydown.enter.prevent="addTodo"
            />
            <button class="btn btn-primary mt-2" type="button" @click="addTodo">
                Add todo
            </button>
        </div>

        <div class="mt-3" v-if="filteredTodos.length">
            <ul class="list-group">
                <li
                    v-for="todo in filteredTodos"
                    :key="todo.id"
                    class="list-group-item d-flex justify-content-between align-items-center"
                >
                    <span>{{ todo.text }}</span>
                    <button class="btn btn-sm btn-outline-danger" type="button" @click="removeTodo(todo.id)">
                        Remove
                    </button>
                </li>
            </ul>
        </div>

        <div v-else class="alert alert-warning mt-3" role="status">
            No todos match your search.
        </div>
    </BootstrapCard>
</template>

