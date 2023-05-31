<script setup>
defineProps({
  listing: Array,
},
)
</script>
<template>
  <span>
    {{ listing.street }} {{ listing.street_nr }}, {{ listing.city }}, {{ listing.city }}, for ${{ listing.price }}
  </span>
</template>

<script>
export default {}
</script>
