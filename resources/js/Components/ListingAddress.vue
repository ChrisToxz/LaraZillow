<script setup>
defineProps({
  listing: Object,
},
)
</script>
<template>
  <span>
    {{ listing.street }} {{ listing.street_nr }}, {{ listing.code }}, {{ listing.city }}, for ${{ listing.price }}
  </span>
</template>

<script>
export default {}
</script>
