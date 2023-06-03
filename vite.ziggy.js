// vite.ziggy.js

import { normalizePath } from 'vite'
import { exec } from 'child_process'
import { relative, resolve } from 'path'
import picomatch from 'picomatch'
import colors from 'picocolors'
import ziggy from './vite.ziggy.js'

export default function ZiggyPlugin(config) {
  const root = process.cwd()
  const log = config?.log ?? true
  const delay = config?.delay ?? 0

  return {
    name: 'ziggy-plugin',
    enforce: 'pre',
    apply: 'serve',
    // NOTE: Enable globbing so that Vite keeps track of the template files.
    config: () => ({ server: { watch: { disableGlobbing: false } } }),
    configureServer(server) {
      server.httpServer.once('listening', () => {
        setTimeout(() => {
          server.config.logger.info(`\n  ${colors.blue(`${colors.bold('ZIGGY')} v${ziggy.version}`)}  ${colors.dim('ready')}`)
        }, 200)
      })

      const files = normalizePath(resolve(root, 'routes/**'))

      const command = () => exec('php artisan ziggy:generate')
      command()

      const shouldReload = picomatch(files)
      const checkReload = (path) => {
        if (shouldReload(path)) {
          setTimeout(command, delay)
          if (log) {
            server.config.logger.info(`${colors.green(`${relative(root, path)} changed, regenarating ziggy file.`)}`, { clear: true, timestamp: true })
          }
        }
      }

      // Ensure Vite keeps track of the files and triggers generation as needed.
      server.watcher.add(files)

      // Perform a generation if any of the watched files changes.
      server.watcher.on('add', checkReload)
      server.watcher.on('change', checkReload)
    },
  }
}
