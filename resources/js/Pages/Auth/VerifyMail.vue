<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<template>
  <div>
    You need to be verified first to access this page.
  </div>
  <div class="mt-2"><Link :href="route('verification.send')" method="post" as="button" class="btn-outline text-indigo-600 dark:text-indigo-400">Resend verification email</Link></div>
</template>

<style scoped>

</style>
