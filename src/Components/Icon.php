<?php

declare(strict_types=1);

namespace ChuckUI\Components;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Icon extends BladeComponent
{
    public function __construct(
        //
    ) {}

    public function render(): View
    {
        return view('chuck-ui::components.icon');
    }
}