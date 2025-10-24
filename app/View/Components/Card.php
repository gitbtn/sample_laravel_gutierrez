<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $image;
    public $title;
    public $description;
    public $button;
    public function __construct($image=null,$title=null,$description=null,$button=null)
    {
        $this->image=$image;
        $this->title=$title;
        $this->description=$description;
        $this->button=$button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
