<script setup>

import HeaderSection from "@/components/headerSection.vue";
import TodoCard from "@/components/todoCard.vue";
import { useTodoStore } from '@/stores/todos';

const todosStore = useTodoStore();
</script>

<template>
  <div class="min-h-full">
    <header-section/>
    <main class="my-2">
     <div>
       <TodoCard v-for="todo in todosStore.todos" :key="todo.id" :todo="todo" />
     </div>
    </main>
  </div>

</template>


