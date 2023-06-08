<script setup>
import {Link} from '@inertiajs/vue3'
import Box from '../../Components/UI/Box.vue'
import Price from '../../Components/Price.vue'
import ListingAddress from '../../Components/ListingAddress.vue'
import ListingSpace from '../../Components/UI/ListingSpace.vue'
import {computed} from 'vue'
import Offer from './Show/Componenets/Offer.vue'

const props = defineProps({
  listing: Object,
})

const hasOffers = computed(
  () => props.listing.offers.length,
)

// Find the offer which have been accepted
const acceptedOffer = computed(()=>{
  if(hasOffers.value){
    return props.listing.offers.find(offer => offer.accepted_at !== null)
  }
  return false
},
)

</script>

<template>
  <div class="mb-4">
    <Link :href="route('realtor.listing.index')">← Go back to Listings</Link>
  </div>

  <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box v-if="!hasOffers" class="flex md:col-span-7 items-center">
      <div class="w-full text-center font-medium text-gray-500">
        No offers
      </div>
    </Box>
    <div v-else class="md:col-span-7 flex flex-col gap-4">
      <Offer v-for="offer in listing.offers" :key="offer.id" :offer="offer" :listing-price="listing.price" :is-sold="listing.sold_at != null" />
    </div>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>Basic Info</template>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>
      <Offer v-if="acceptedOffer" :key="acceptedOffer.id" :offer="acceptedOffer" :listing-price="listing.price" :is-sold="listing.sold_at != null" />
    </div>
  </section>
</template>

<style scoped>

</style>
