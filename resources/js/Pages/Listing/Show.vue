<script setup>
import ListingAddress from '../../Components/ListingAddress.vue'

defineProps({
  listing: Array,
},
)
</script>
<template>
  <ListingAddress :listing="listing" />
</template>


<script>
export default {}
</script>
