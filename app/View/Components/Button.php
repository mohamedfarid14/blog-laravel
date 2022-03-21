<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $href;
    public $class;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$href,$class,$message)
    {
        //
        $this->type = $type;
        $this->href = $href;
        $this->class = $class;
        $this->message = $message;
        // dump($href);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
