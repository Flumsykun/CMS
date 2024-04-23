import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import {viteMockServe} from "vite-plugin-mock";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        // viteMockServe({supportTs: false})
    ],
});
