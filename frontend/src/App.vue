<script setup>

import HeaderSection from "@/components/headerSection.vue";
import TodoCard from "@/components/todoCard.vue";
import {useTodoStore} from '@/stores/todos';
import {onMounted} from "vue";

const todosStore = useTodoStore();

onMounted(() => {
  todosStore.fetchTodos();
});
</script>

<template>
  <div class="min-h-full">
    <header-section/>
    <main class="my-2">
      <div v-if="todosStore.loading" class="loader flex justify-center items-center">
        <div class="w-16 h-16 border-t-4 border-b-4 border-blue-500 rounded-full animate-spin"></div>
      </div>
      <div v-else>
        <TodoCard v-for="todo in todosStore.todos" :key="todo.id" :todo="todo"/>
      </div>
    </main>
  </div>

</template>


