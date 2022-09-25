import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel([
            'app/Core/Resources/Assets/sass/app.scss',
            'app/Core/Resources/Assets/js/app.js',
            'app/Domain/Example/Resources/Assets/sass/app.scss',
            'app/Domain/Example/Resources/Assets/js/app.js',
            'app/Domain/Foo/Resources/Assets/sass/app.scss',
            'app/Domain/Foo/Resources/Assets/js/app.js',
        ]),
    ],
    resolve: {
        alias: {
            // '~@fortawesome': path.resolve(__dirname, 'node_modules/@fortawesome'),
        }
    },
    build: {
      chunkSizeWarningLimit: 1024,
      rollupOptions: {
        output: {
          manualChunks: {
            alpinejs: ["alpinejs"]
          }
        }
      }
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
