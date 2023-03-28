<?php

namespace ChuckUI;

use ChuckUI\Components\BladeComponent;
use ChuckUI\Components\LivewireComponent;

use ChuckUI\Console\BootstrapCommand;
use ChuckUI\Console\PublishCommand;
use ChuckUI\Console\Presets\Bootstrap;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Laravel\Ui\UiCommand;
use Livewire\Livewire;

final class ChuckUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chuck-ui.php', 'chuck-ui');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BootstrapCommand::class,
                PublishCommand::class,
            ]);
        }
    }

    public function boot(): void
    {
        $this->bootMacros();
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootLivewireComponents();
        $this->bootDirectives();
        $this->bootPublishing();
    }

    private function bootMacros(): void
    {
        UiCommand::macro('chuck', function (UiCommand $command) {
            Bootstrap::install();

            $command->info('Bootstrap scaffolding installed successfully.');
            $command->warn('Please run [npm install && npm run dev] to compile your fresh scaffolding.');
        });
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-ui');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('chuck-ui.prefix', '');
            $assets = config('chuck-ui.assets', []);

            /** @var BladeComponent $component */
            foreach (config('chuck-ui.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);

                $this->registerAssets($component, $assets);
            }
        });
    }

    private function bootLivewireComponents(): void
    {
        // Skip if Livewire isn't installed.
        if (! class_exists(Livewire::class)) {
            return;
        }

        $prefix = config('chuck-ui.prefix', '');
        $assets = config('chuck-ui.assets', []);

        /** @var LivewireComponent $component */
        foreach (config('chuck-ui.livewire', []) as $alias => $component) {
            $alias = $prefix ? "$prefix-$alias" : $alias;

            Livewire::component($alias, $component);

            $this->registerAssets($component, $assets);
        }
    }

    private function registerAssets($component, array $assets): void
    {
        foreach ($component::assets() as $asset) {
            $files = (array) ($assets[$asset] ?? []);

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.css');
            })->each(function (string $style) {
                ChuckUI::addStyle($style);
            });

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.js');
            })->each(function (string $script) {
                ChuckUI::addScript($script);
            });
        }
    }

    private function bootDirectives(): void
    {
        Blade::directive('chuckuiStyles', function (string $expression) {
            return "<?php echo ChuckUI\\ChuckUI::outputStyles($expression); ?>";
        });

        Blade::directive('chuckuiScripts', function (string $expression) {
            return "<?php echo ChuckUI\\ChuckUI::outputScripts($expression); ?>";
        });
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/chuck-ui.php' => $this->app->configPath('chuck-ui.php'),
            ], 'chuck-ui-config');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/chuck-ui'),
            ], 'chuck-ui-views');
        }
    }
}