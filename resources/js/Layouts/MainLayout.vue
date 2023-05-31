<script setup>
import {Link} from '@inertiajs/vue3'
import {ref} from 'vue'

const timer = ref(0)
setInterval(() => timer.value++, 1000)
</script>

<template>
  <Link href="/">Main</Link> -
  <Link href="/show">Show</Link>
  <div>The page with time {{ timer }}</div>
  <slot />
</template>

<script>
export default {}
</script>
