const browserSync = require('browser-sync').create();
browserSync.init({
    proxy: 'http://localhost:9008',
    files: ['public/**/*.*', 'resources/views/**/*.*'],
    reloadDelay: 300,
    injectChanges: false,
});
