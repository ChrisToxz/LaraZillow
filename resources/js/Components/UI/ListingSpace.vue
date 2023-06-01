<script setup>
defineProps({
  listing: Object,
},
)
</script>

<template>
  <div>
    <span class="font-bold">{{ listing.beds }} bds <span class="text-gray-400">|</span> {{ listing.baths }} ba <span class="text-gray-400">|</span> {{ listing.area }} m2</span>
  </div>
</template>

<style scoped>

</style>
