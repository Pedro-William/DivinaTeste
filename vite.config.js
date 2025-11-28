import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['../css/app.css', '../js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
