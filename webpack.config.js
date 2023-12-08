var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/bundles/tabler/')

    // make sure the manifest prefix matches the structure in the real application
    .setManifestKeyPrefix('bundles/tabler/')

    // delete old files before creating them
    .cleanupOutputBeforeBuild()

    // add debug data in development
    .enableSourceMaps(!Encore.isProduction())

    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .addEntry('tabler', './assets/tabler.js')
    .addEntry('tabler-rtl', './assets/tabler-rtl.js')

    // disabled as ""webpack-notifier": "^1.13"" id currently not compatible with ARM systems
    //.enableBuildNotifications()

    // don't use a runtime.js
    .disableSingleRuntimeChunk()

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // enable sass/scss parser
    // see https://symfony.com/doc/current/frontend/encore/bootstrap.html
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    // add hash after file name
    .configureImageRule({
        filename: 'images/[name][ext]?[hash:8]',
    })
    .configureFontRule({
        filename: 'fonts/[name][ext]?[hash:8]'
    })
    .configureFilenames({
        js: '[name].js?[chunkhash]',
        css: '[name].css?[contenthash]',
    })
;

module.exports = Encore.getWebpackConfig();
