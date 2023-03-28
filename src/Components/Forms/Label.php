<?php

declare(strict_types=1);

namespace ChuckUI\Components\Forms;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Label extends BladeComponent
{
    public function __construct(
        public string|null $for = null, 
        public string|null $label = null
    ) {}

    public function render(): View
    {
        return view('chuck-ui::components.forms.label');
    }
}