<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({links: Array})

</script>

<template>
  <div class="flex gap-1">
    <template v-if="links.length">
      <template v-for="(link, index) in links">
        <Link
          v-if="link.url"
          :key="index" class="py-2 px-4 rounded-md hover:bg-indigo-400 dark:hover:bg-indigo-600"
          :href="link.url"
          :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active}"
          v-html="link.label"
        />
      </template>
    </template>
  </div>
</template>

<style scoped>

</style>
