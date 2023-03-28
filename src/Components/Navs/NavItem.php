<?php

declare(strict_types=1);

namespace ChuckUI\Components\Navs;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class NavItem extends BladeComponent
{
    public function __construct(
        public bool $last = false
    ) {}

    public function render(): View
    {
        return view('chuck-ui::components.navs.nav-item');
    }
}