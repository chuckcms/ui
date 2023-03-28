<?php

declare(strict_types=1);

namespace ChuckUI\Components\Navs;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class NavDropdown extends BladeComponent
{
    public function __construct(
        public string|null $icon = null,
        public string|null $label = null,
        public string|null $route = null,
        public string|null $url = null,
        public string|null $href = null,
        public string|null $click = null,
        public bool $last = false,
    ) {
        if ($route) {
            $this->href = route($route);  
        } else if ($url) {
            $this->href = url($url);
        } 
    }

    public function render(): View
    {
        return view('chuck-ui::components.navs.nav-dropdown');
    }
}