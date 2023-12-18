<script setup>

import TodoCard from "~/components/todos/todoCard.vue";
import {useTodoStore} from "~/stores/todos.js";
import {onMounted} from "vue";

const todosStore = useTodoStore();

onMounted(() => {
  todosStore.fetchTodos();
});

const updateTodo = (todo) => {
  todosStore.updateTodo(todo);
};
</script>

<template>
<div>
  <div v-if="todosStore.loading" class="loader flex justify-center items-center">
    <div class="w-16 h-16 border-t-4 border-b-4 border-blue-500 rounded-full animate-spin"></div>
  </div>
  <div v-else>
    <TodoCard @change="updateTodo" v-for="todo in todosStore.todos" :key="todo.id" :todo="todo"/>
  </div>
</div>
</template>

<style scoped>

</style>