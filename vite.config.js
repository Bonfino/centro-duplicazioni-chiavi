import { defineConfig } from 'vite';
import { resolve } from 'node:path';

export default defineConfig({
    // Gli asset devono funzionare anche nella sottocartella di un tema WordPress.
    base: './',
    css: {
        preprocessorOptions: {
            scss: {
                // Bootstrap 5 usa ancora gli import Sass tradizionali.
                quietDeps: true,
                silenceDeprecations: ['import'],
            },
        },
    },

    build: {
        outDir: 'assets/dist',
        emptyOutDir: true,
        // Conserva il foglio CSS separato anche con il bundle in formato IIFE.
        cssCodeSplit: false,

        rolldownOptions: {
            input: resolve(process.cwd(), 'assets/src/js/main.js'),

            output: {
                // WordPress carica uno script classico: isolare i nomi del bundle
                // evita collisioni con i globali del backend, come Underscore (_).
                format: 'iife',
                entryFileNames: 'js/main.js',

                assetFileNames: (assetInfo) => {
                    if (
                        assetInfo.names &&
                        assetInfo.names.some(name => name.endsWith('.css'))
                    ) {
                        return 'css/main.css';
                    }

                    return 'assets/[name][extname]';
                },
            },
        },
    },
});
