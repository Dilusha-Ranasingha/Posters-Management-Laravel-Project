import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // Your Tailwind CSS file
                'resources/js/app.js',    // Default JS file (create it if missing)
            ],
            refresh: true, // Auto-refresh browser on file changes
        }),
    ],
});