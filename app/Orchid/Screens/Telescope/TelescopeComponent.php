<?php

namespace App\Orchid\Screens\Telescope;

use Illuminate\View\Component;

class TelescopeComponent extends Component
{
    /**
     * @var array
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->attributes = [
            'src' => env('APP_URL') . "/telescope",
            'loading' => "lazy",
            'width' => "100%",
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div data-controller="browsing" class="d-block bg-white rounded mb-3">
    <iframe @foreach($attributes as $key => $value) {{ $key }}='{{$value}}' @endforeach></iframe>
</div>
blade;
    }
}
