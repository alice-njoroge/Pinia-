<script setup>
import {defineProps} from 'vue'

const props = defineProps({
  todo: Object
})
const formatStatus = (status) => {
  switch (status) {
    case 'NOT_STARTED' :
      return 'todo'
    case 'IN_PROGRESS':
      return 'in progress'
    case 'COMPLETED' :
      return 'completed'
  }
}
const handleCheckboxChange = (event) => {
  // handle checkbox change event here
  console.log('clicked')
}


</script>

<template>
  <div class=" my-2 max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
      <label class="flex items-center pl-4">
        <input @change="handleCheckboxChange" type="checkbox" class="w-5  h-5 inline-block mr-2 border border-gray-500 rounded" />
      </label>
      <div class="p-8 w-full" :class="{'line-through' : todo.status === 'COMPLETED'}"
      >
        <div class="font-bold text-lg">
          {{ todo.task }}
        </div>
        <div class="mt-2 flex justify-between gap-2 text-gray-500">
          <div><span class="font-bold">Status: </span> {{ formatStatus(todo.status) }}</div>
          <div>
            <svg v-if="todo.favourites" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>