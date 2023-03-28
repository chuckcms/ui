<?php

declare(strict_types=1);

namespace ChuckUI\Components\Navs;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Navbar extends BladeComponent
{
    /** @var string */
    public $id;

    /** @var string */
    public $brand;

    /** @var string */
    public $brandUrl;

    /** @var string */
    public $darkMode;

    /** @var string */
    public $expand;

    /** @var string */
    public $logo;

    /** @var string */
    public $logoText;

    public function __construct(
        bool $brand = false,
        string $brandUrl = '#',
        string $darkMode = null,
        string $expand = 'lg',
        string $logo = null,
        string $logoText = null,
    ) {
        $this->id = 'navbar-'.Str::random(8);

        $this->brand = $brand;
        $this->brandUrl = $brandUrl;
        $this->darkMode = $darkMode;
        $this->expand = $expand;
        $this->logo = $logo;
        $this->logoText = $logoText;
    }

    public function render(): View
    {
        return view('chuck-ui::components.navs.navbar');
    }
}