<script setup>
import {Link, useForm} from '@inertiajs/vue3'

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const register = () => form.post(route('user.store'))
</script>

<template>
  <form @submit.prevent="register">
    <div class="w-1/2 mx-auto">
      <div>
        <label for="name" class="label">Name</label>
        <input id="name" v-model="form.name" type="text" class="input" />
        <div v-if="form.errors.name" class="input-error">
          {{ form.errors.name }}
        </div>
      </div>
      <div class="mt-4">
        <label for="email" class="label">Email</label>
        <input id="email" v-model="form.email" type="text" class="input" />
        <div v-if="form.errors.email" class="input-error">
          {{ form.errors.email }}
        </div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input id="password" v-model="form.password" type="password" class="input" />
        <div v-if="form.errors.password" class="input-error">
          {{ form.errors.password }}
        </div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password confirmation</label>
        <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input" />
        <div v-if="form.errors.password_confirmation" class="input-error">
          {{ form.errors.password_confirmation }}
        </div>
      </div>
      <div class="mt-4">
        <button class="btn-indigo w-full">Create account</button>
      </div>
      <div class="mt-4 text-center">
        <Link :href="route('login')" class="text-sm text-gray-600 dark:text-gray-400">Already an account? Click here to login</Link>
      </div>
    </div>
  </form>
</template>

<style scoped>

</style>
