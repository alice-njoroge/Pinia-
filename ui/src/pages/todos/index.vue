<script setup>

import TodoCard from "~/components/todos/todoCard.vue";
import {useTodoStore} from "~/stores/todos.js";
import {onMounted} from "vue";
import ToggleSwitch from "~/components/utils /toggleSwitch.vue";

const todosStore = useTodoStore();

onMounted(() => {
  todosStore.fetchTodos();
});

const updateTodo = (todo) => {
  todosStore.updateTodo(todo);
};
const favourites = ref(false);

</script>

<template>
  <div>
    <div class="flex justify-center">
      <ToggleSwitch v-model="favourites"/>
    </div>
    <div v-if="todosStore.loading" class="loader flex justify-center items-center">
      <div class="w-16 h-16 border-t-4 border-b-4 border-blue-500 rounded-full animate-spin"></div>
    </div>
    <div v-else>
      <TodoCard v-if="favourites" @change="updateTodo" v-for="todo in todosStore.favourites" :key="todo.id" :todo="todo"/>
      <TodoCard v-else @change="updateTodo" v-for="todo in todosStore.todos" :key="todo.id" :todo="todo"/>
    </div>
  </div>
</template>

<style scoped>
input:checked ~ .toggle__dot {
  transform: translateX(100%);
}

input:checked ~ .toggle__line {
  background-color: #8db4f5;
}

.toggle__dot {
  top: -.25rem;
  left: -.25rem;
  transition: all 0.3s ease-in-out;
}

.toggle__line {
  transition: background 0.3s ease-in-out;
}

</style>