<script setup>
import {computed} from 'vue'

const props = defineProps({
  price: [Number, String],
})

const FormattedPrice = computed(
  () => Number(props.price).toLocaleString('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0,
  }),
)
</script>

<template>
  <span>{{ FormattedPrice }}</span>
</template>
