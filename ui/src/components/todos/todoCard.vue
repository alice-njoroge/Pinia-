<script setup>
import {defineProps, defineEmits} from 'vue'

const emit  = defineEmits(['change'])
const props = defineProps({
  todo: Object
})

const handleChange = (todo) => {
  emit('change', todo)
}
const updateFavourite = (todo) => {
  todo.isFavourite = !todo.isFavourite;
  handleChange(todo);
}


</script>

<template>
  <div class=" my-2 max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="flex items-center justify-between p-8 w-full" :class="{'line-through' : todo.isCompleted }">
      <label class="flex items-center">
        <input v-model="todo.isCompleted" @change="handleChange(todo)" type="checkbox"
               class="w-5  h-5 inline-block mr-2 border border-gray-500 rounded"/>
      </label>
      <div v-if="todo.isCompleted" class="font-bold text-lg">
        {{ todo.title }}
      </div>
      <input v-else v-model="todo.title" @change="handleChange(todo)"
             class="font-bold text-lg leading-tight focus:outline-none focus:shadow-outline" type="text">
      <div @click="updateFavourite(todo)">
        <svg v-if="todo.isFavourite" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path
              d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
        </svg>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>