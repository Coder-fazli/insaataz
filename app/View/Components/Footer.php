<?php

namespace App\View\Components;
use App\Repositories\ServicesRepository;
use App\Models\Settings;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $settings = Settings::first();
        $logo = $settings->logo;

        return view('components.footer', [
            'settings' => $settings,
            'logo' => $logo
        ]);
    }
}
