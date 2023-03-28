<?php

declare(strict_types=1);

namespace ChuckUI\Components\Layouts;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Html extends BladeComponent
{
    /** @var string */
    public $htmlClass;

    /** @var string */
    protected $title;

    public function __construct
    (
        string $htmlClass = 'h-100',
        string $title = ''
    )
    {
        $this->htmlClass = $htmlClass; 
        $this->title = $title;
    }

    public function render(): View
    {
        return view('chuck-ui::components.layouts.html');
    }

    public function title(): string
    {
        return $this->title ?: (string) config('app.name', 'Laravel');
    }
}