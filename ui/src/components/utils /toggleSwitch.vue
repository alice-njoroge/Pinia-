<template>
  <div class="flex justify-center items-center w-full">
    <span class="text-2xl font-bold flex pr-2">{{ title }} </span>
    <div class=" relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
      <input type="checkbox" name="toggle" id="toggle"
             class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
             v-model="checked" @change="emitEvent">
      <label for="toggle"
             class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div>
  </div>
</template>

<script setup>


const props = defineProps({
  title: {
    type: String,
    default: 'Favourites'
  },
  modelValue: {
    type: Boolean,
    default: false
  },
});
const checked = ref(props.modelValue);
const emit = defineEmits(['update:modelValue'])
const emitEvent = () => {
  emit('update:modelValue', checked.value);
};


</script>

<style scoped>
.toggle-checkbox:checked {
  @apply right-0 border-green-400;
  @apply bg-green-400;
}

.toggle-checkbox:checked + .toggle-label {
  @apply bg-gray-200;
}

.toggle-checkbox:focus {
  @apply outline-none;
}

.toggle-checkbox:focus-visible {
  @apply ring-2 ring-offset-2 ring-offset-gray-600 ring-white;
}

.toggle-label {
  @apply block h-6 w-10 rounded-full bg-gray-400;
}

.toggle-checkbox {
  @apply absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer right-4 top-0;
  @apply transition-all duration-200 ease-in-out;
}
</style>