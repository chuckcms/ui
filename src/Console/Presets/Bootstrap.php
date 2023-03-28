<?php

namespace ChuckUI\Console\Presets;

use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset;

class Bootstrap extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateViteConfiguration();
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'alpinejs' => '^3.0.6',
            '@alpinejs/focus' => '^3.10.5',
            'bootstrap' => '^5.2.3',
            '@popperjs/core' => '^2.11.6',
            'sass' => '^1.56.1',
        ] + $packages;
    }

    /**
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration()
    {
        copy(__DIR__.'/bootstrap-stubs/vite.config.js', base_path('vite.config.js'));
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));

        copy(__DIR__.'/bootstrap-stubs/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__.'/bootstrap-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/bootstrap-stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}