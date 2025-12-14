import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/admin.css',
                    'resources/js/app.js',
                    'resources/js/admin.js',
                    'resources/js/beranda.js',
                    ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
