<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoModal extends Component
{

    public $videoUrl;

    /**
     * Create a new component instance.
     */
    public function __construct($videoUrl)
    {
        $this->videoUrl = $videoUrl;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video-modal');
    }
}
