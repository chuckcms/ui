<?php

declare(strict_types=1);

namespace ChuckUI\Components\Forms;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Form extends BladeComponent
{
    public function __construct(
        public string|null $action = null, 
        public string $method = 'POST', 
        public bool $hasFiles = false
    ) {
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('chuck-ui::components.forms.form');
    }
}