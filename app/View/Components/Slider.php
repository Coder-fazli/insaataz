<?php

namespace App\View\Components;

use App\Repositories\SliderRepository;
use Illuminate\View\Component;

class Slider extends Component
{
    private $sliders = [];

    public function __construct(private SliderRepository $sliderRepository, $type)
    {
        $this->sliders = $this->sliderRepository->getByType($type, ['training:id,slug']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider', ['sliders' => $this->sliders]);
    }
}
