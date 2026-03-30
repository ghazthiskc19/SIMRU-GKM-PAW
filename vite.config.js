import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/shared_header_nav.css',
                'resources/css/halaman_menu_style.css',
                'resources/css/profil_mahasiswa_style.css',
                'resources/css/home_style.css',
                'resources/js/home_calendar.js',
                'resources/css/list_ruangan_style.css',
                'resources/js/list_ruangan.js',
                'resources/css/list_ruangan_detail_style.css',
                'resources/js/list_ruangan_detail.js',
                'resources/css/jadwal_ruangan_style.css',
                'resources/js/jadwal_ruangan.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
        hmr: {
            host: '127.0.0.1',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
