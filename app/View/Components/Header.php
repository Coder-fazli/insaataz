<?php

namespace App\View\Components;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServicesRepository;
use Illuminate\View\Component;
use App\Models\Settings;
class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(private CategoryRepository $categoryRepository,private ProductRepository $productRepository)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $logo = Settings::first()->logo;
  
        return view('components.header',['categories'=>$this->categoryRepository->getParents(),'products'=>$this->productRepository->getProductsFromCart(), 'logo' => $logo]);
    }
}
