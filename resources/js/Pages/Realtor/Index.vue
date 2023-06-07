<script setup>
import {Link} from '@inertiajs/vue3'
import Box from '../../Components/UI/Box.vue'
import Price from '../../Components/Price.vue'
import ListingSpace from '../../Components/UI/ListingSpace.vue'
import ListingAddress from '../../Components/ListingAddress.vue'
import RealtorFilters from './Index/Components/RealtorFilters.vue'
import Pagination from '../../Components/UI/Pagination.vue'

defineProps({listings: Object, filters: Object})
</script>

<template>
  <h1 class="text-3xl mb-4">Your Listings</h1>
  <section class="mb-4">
    <RealtorFilters :filters="filters" />
  </section>
  <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed': listing.deleted_at}">
      <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
        <div :class="{'opacity-25': listing.deleted_at}">
          <div class="xl:flex items-center gap-2">
            <Price :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>
          <ListingAddress :listing="listing" class="text-gray-500" />
        </div>
        <section>
          <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
            <Link class="btn-outline text-xs font-medium" :href="route('listing.show', listing.id)">Preview</Link>
            <Link
              class="btn-outline text-xs font-medium" :href="route('realtor.listing.edit', listing.id)"
            >
              Edit
            </Link>
            <Link v-if="!listing.deleted_at" class="btn-outline text-xs font-medium hover:bg-red-200" :href="route('realtor.listing.destroy', listing.id)" method="delete" as="button">
              Delete
            </Link>
            <Link v-else class="btn-outline text-xs font-medium hover:bg-green-200" :href="route('realtor.listing.restore', {listing: listing.id})" method="put" as="button">
              Restore
            </Link>
          </div>

          <div class="mt-2">
            <Link :href="route('realtor.listing.image.create', {listing: listing.id})" class="block w-full btn-outline text-sm font-medium text-center">Images ( {{ listing.images_count }} )</Link>
            <Link :href="route('realtor.listing.show', {listing: listing.id})" class="block w-full btn-outline text-sm font-medium text-center mt-2">Offers ( {{ listing.offers_count }} )</Link>
          </div>
        </section>
      </div>
    </Box>
  </section>
  <div class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="listings.links" />
  </div>
</template>

<style scoped>

</style>
