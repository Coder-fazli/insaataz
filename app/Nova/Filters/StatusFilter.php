<?php

namespace App\Nova\Filters;

use App\Enum\Status;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class StatusFilter extends Filter
{
    public function __construct(){}

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Status';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
//        $ids = $this->productRepository::recursivelyChildren(Category::find($value));
//
//        $ids = array_merge([$value], $ids);

        return $query->where('status', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return array_flip(Status::getList());
    }
}
