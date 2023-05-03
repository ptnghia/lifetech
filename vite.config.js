import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
          output: {
            chunkFileNames: 'assets/js/[name]-[hash].js',
            entryFileNames: 'assets/js/[name]-[hash].js',
            
            assetFileNames: ({name}) => {
                if (/\.(gif|jpe?g|png|svg)$/.test(name ?? '')){
                    return 'assets/images/[name]-[hash][extname]';
                }
              
                if (/\.css$/.test(name ?? '')) {
                    return 'assets/css/[name]-[hash][extname]';   
                }

                if (/\.(ttf|woff|woff2|otf)$/.test(name ?? '')){
                    return 'assets/fonts/[name]-[hash][extname]';
                }
              // default value
              // ref: https://rollupjs.org/guide/en/#outputassetfilenames
              return 'assets/[name]-[hash][extname]';
            },
          },
        }
      },
});
