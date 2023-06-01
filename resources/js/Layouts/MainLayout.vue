<script setup>
import { computed } from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

const flashSuccess = computed(
  () => usePage().props.flash.success,
)

const test = computed(
  () => usePage().props.test,
)
</script>

<template>
  <Link href="/">Main</Link> -
  <Link href="/show">Show</Link> -
  <Link href="/listing">Listings</Link> -
  <Link href="/listing/create">Create</Link>
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  {{ test }}
  <slot />
</template>

<script>
export default {}
</script>

<style scoped>
.success {
    background-color:green;
    color:white;
}
</style>
