<?php

namespace App\View\Components;

use Illuminate\View\Component;

class master extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $value;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = Null, $value = Null)
    {
        $this->type = $type ;
        $this->value = $value ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.master');
    }
}
