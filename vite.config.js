import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'
import ziggy from './vite.ziggy.js'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    vue({
      template: {
        base: null,
        includeAbsolute: false,
      },
    }),
    ziggy({
      // Indicates if the regenerations must be logged. Default true.
      log: true,

      // How many milliseconds to wait before regenerating after a file change. Default 0.
      delay: 100,
    }),
  ],
  resolve: {
    alias: {
      ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
    },
  },
})
