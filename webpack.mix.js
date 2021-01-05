const cssImport = require('postcss-import')
const cssNesting = require('postcss-nesting')
const mix = require('laravel-mix')
const path = require('path')
const purgecss = require('@fullhuman/postcss-purgecss')
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css/')
    .options({
            processCssUrls: false,
            postCss: [
                    cssImport(),
                    cssNesting(),
                    tailwindcss('tailwind.config.js'),
                    ...mix.inProduction() ? [
                            purgecss({
                                    content: ['./app/Views/**/*.php'],
                                    defaultExtractor: content => content.match(/[\w-/:.]+(?<!:)/g) || [],
                                    whitelistPatternsChildren: [/nprogress/],
                            }),
                    ] : [],
            ],
    })
    // .browserSync()