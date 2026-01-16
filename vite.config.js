import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import autoprefixer from 'autoprefixer';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/web.css',
                'resources/css/admin.css',
                'resources/js/app.js',
                'resources/js/web/web.js',
                'resources/js/admin/admin.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '@web': '/resources/js/web',
            '@admin': '/resources/js/admin',
            '@shared': '/resources/js/shared',
        },
    },
    css: {
        postcss: {
            plugins: [autoprefixer()],
        },
    },
    build: {
        chunkSizeWarningLimit: 1000, // Naikkan batas warning ke 1000 KB
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['axios', 'tinymce', 'emoji-picker-element'],
                    admin: [
                        'resources/js/admin/admin.js',
                        'resources/js/admin/features/settings/school-profile.js',
                        'resources/js/admin/features/school-profile/form.js',
                        'resources/js/admin/modules/upload/generic.js',
                    ],
                    shared: [
                        'resources/js/shared/ui/notification.js',
                        'resources/js/shared/index.js',
                    ],
                },
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
