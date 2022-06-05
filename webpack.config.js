// This project uses "Yarn" package manager for managing JavaScript dependencies along
// with "Webpack Encore" library that helps working with the CSS and JavaScript files
// that are stored in the "assets/" directory.
//
// Read https://symfony.com/doc/current/frontend.html to learn more about how
// to manage CSS and JavaScript files in Symfony applications.
var Encore = require('@symfony/webpack-encore');
var path = require('path');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .autoProvidejQuery()
    .autoProvideVariables({
        "jQuery.tagsinput": "bootstrap-tagsinput"
    })
    .enableSassLoader()
    // when versioning is enabled, each filename will include a hash that changes
    // whenever the contents of that file change. This allows you to use aggressive
    // caching strategies. Use Encore.isProduction() to enable it only for production.
    .enableVersioning(false)
    .addEntry('app', './assets/js/app.js')
    .addEntry('login', './assets/js/login.js')
    .addEntry('admin', './assets/js/admin.js')
    .addEntry('search', './assets/js/search.js')
    .addEntry('clipboard', './assets/js/clipboard.js')
    .addEntry('corazones', './assets/js/corazones.js')
    .addEntry('app_corazones', './assets/js/app_corazones.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    // .enableIntegrityHashes(Encore.isProduction())
    .configureBabel(null, {
        useBuiltIns: 'usage',
        corejs: 3,
    })

    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    // This is our alias to the root vue components dir
    .addAliases({
        '@': path.resolve(__dirname, 'assets', 'js'),
        styles: path.resolve(__dirname, 'assets', 'scss'),
    })

    .copyFiles({
        from: './assets/images',
        to: Encore.isProduction()
            ? 'images/[path][name].[hash:8].[ext]'
            : 'images/[path][name].[ext]',
    })

    // Enable .vue file processing
    // .enableVueLoader()
    .enableVueLoader(() => {}, { runtimeCompilerBuild: true })

    // gives better module CSS naming in dev
    .configureCssLoader((config) => {
        if (!Encore.isProduction() && config.modules) {
            config.modules.localIdentName = '[name]_[local]_[hash:base64:5]';
        }
    })

    // enables Sass/SCSS support
    .enableSassLoader()
;

module.exports = Encore.getWebpackConfig();
