<?php

declare(strict_types=1);

namespace ChuckUI\Console;

use Illuminate\Console\Command;
use InvalidArgumentException;

class BootstrapCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'chuck-ui:bootstrap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Swap the front-end scaffolding for the application';

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        $this->bootstrap();
    }

    /**
     * Install the "bootstrap" preset.
     *
     * @return void
     */
    protected function bootstrap()
    {
        Presets\Bootstrap::install();

        $this->components->info('Bootstrap scaffolding installed successfully.');
        $this->components->warn('Please run [npm install && npm run dev] to compile your fresh scaffolding.');
    }
}