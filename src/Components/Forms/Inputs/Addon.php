<?php

declare(strict_types=1);

namespace ChuckUI\Components\Forms\Inputs;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Addon extends BladeComponent
{
    public function __construct(
        public string|null $icon = null, 
        public string|null $label = null
    ) {}

    public function render(): View
    {
        return view('chuck-ui::components.forms.inputs.addon');
    }
}