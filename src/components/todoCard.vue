<script setup>
import {defineProps} from 'vue'

const props = defineProps({
  todo: Object
})


</script>

<template>
  <div class=" my-2 max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
<!--      <div class="md:flex-shrink-0">-->
<!--        <img class="h-48 w-full object-cover md:w-48" src="../assets/img.png" alt="Man looking at item at a store">-->
<!--      </div>-->
      <div class="p-8">
        <div>
          {{todo.task}}
        </div>
        <p class="mt-2 text-gray-500">
          Getting a new business off the ground is a lot of hard work.
          Here are five ideas you can use to find your first customers.
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>