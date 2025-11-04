import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build'
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        port: process.env.VITE_PORT || 5174,
        strictPort: true,
        hmr: {
            host: '127.0.0.1',
            protocol: 'http'
        }
    },
    build: {
        sourcemap: true,
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['gsap', 'swiper']
                }
            }
        }
    }
});
