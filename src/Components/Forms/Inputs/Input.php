<?php

declare(strict_types=1);

namespace ChuckUI\Components\Forms\Inputs;

use ChuckUI\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Input extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $type;

    /** @var string */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

    public function render(): View
    {
        return view('chuck-ui::components.forms.inputs.input');
    }
}