const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore
    .configureRuntimeEnvironment(process.env.NODE_ENV || 'development')
  ;
}

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addStyleEntry('styles', './assets/styles/app.css')
  .addEntry('app', './assets/js/app.js')
  .enableStimulusBridge('./assets/controllers.json')
  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
