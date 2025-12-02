<?php

namespace App\View\Components;

use App\Repositories\PartnerRepository;
use Illuminate\View\Component;

class partners extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(private PartnerRepository $partnerRepository)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partners',[
            'partners'=>$this->partnerRepository->paginate(12),
        ]);
    }
}
