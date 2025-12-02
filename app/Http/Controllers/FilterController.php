<?php

namespace App\Http\Controllers;

use App\Enum\InputType;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\EmailRequest;
use App\Models\ContactForm;
use App\Models\Email;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FilterController extends Controller
{
    public function __construct(
//        private SliderRepository    $sliderRepository,
        private CategoryRepository $categoryRepository,
        private ProductRepository  $productRepository,


    )
    {

    }


    public function filter($category_id)
    {
        $category = $this->categoryRepository->get($category_id, ['attributesGroup.attributes']);
        if (!$category_id) {
            return [];
        }
        $groups = $category->attributesGroup ?? [];
        $product = \App\Models\Product::with('attributes')->where('id', request()->product_id)->first();
        $getFields = $this->generateFields($groups,$product);



//            if ($product) {
//                $field->value = $product[$name];
//            }
//            $fields[] = $field->jsonSerialize();
//        }

        return $getFields;
    }

    public function generateFields($attributesGroup,$product)
    {
        $fields = [];
        foreach ($attributesGroup as $name => $group) {
            $field = null;
            $type = $group->type;
            switch ($type) {
                case InputType::SELECT:
                    $options = $this->getOptionsAttributes($group->attributes);
                    $field = Select::make($group->title, "attrs[]")->options($options)->nullable();
                    $field->value = $product->attributes->where('group_id',$group->id)->first()?->attribute_id;
                    break;
                case InputType::TEXT;
                    $field = Text::make($group->title, "attrs[]");
                    break;
            }
//            if ($product) {
//                $field->default(1);
//            }

            $fields[] = $field->jsonSerialize();
        }
        return $fields;
    }

    public function getOptionsAttributes($attributes)
    {
        $options = [];
        foreach ($attributes as $attribute) {
            $options[$attribute->id] = ['label' => $attribute->title];

        }
        return $options;
    }

}
