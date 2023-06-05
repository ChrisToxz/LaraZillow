<script setup>
import {Link} from '@inertiajs/vue3'
import Box from '../../Components/UI/Box.vue'
import Price from '../../Components/Price.vue'
import ListingSpace from '../../Components/UI/ListingSpace.vue'
import ListingAddress from '../../Components/ListingAddress.vue'
import RealtorFilters from './Index/Components/RealtorFilters.vue'

defineProps({listings: Object, filters: Object})
</script>

<template>
  <h1 class="text-3xl mb-4">Your Listings</h1>
  <section class="mb-4">
    <RealtorFilters :filters="filters" />
  </section>
  <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings" :key="listing.id">
      <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
        <div>
          <div class="xl:flex items-center gap-2">
            <Price :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>
          <ListingAddress :listing="listing" class="text-gray-500" />
        </div>
        <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
          <Link class="btn-outline text-xs font-medium" href="A">Preview</Link>
          <Link class="btn-outline text-xs font-medium" href="A">Edit</Link>
          <Link class="btn-outline text-xs font-medium" href="route('realtor.listing.destroy', listing.id)" method="delete" as="button">Delete</Link>
        </div>
      </div>
    </Box>
  </section>
</template>

<style scoped>

</style>