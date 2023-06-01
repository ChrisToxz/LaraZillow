<script setup>
import { computed } from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

const flashSuccess = computed(
  () => usePage().props.flash.success,
)

</script>

<template>
  <Link href="/listing">Listings</Link> -
  <Link href="/listing/create">New Listing</Link>
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
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
