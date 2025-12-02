<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // User::class => UserPolicy::class,
        'App\Models\User'               => 'App\Policies\UserPolicy',
        'App\Models\About'              => 'App\Policies\AboutPolicy',
        'App\Models\AttributeGroup'     => 'App\Policies\AttributeGroupPolicy',
        'App\Models\Attribute'          => 'App\Policies\AttributePolicy',
        'App\Models\Blog'               => 'App\Policies\BlogPolicy',
        'App\Models\BlogPhotos'         => 'App\Policies\BlogPhotoPolicy',
        'App\Models\Brand'              => 'App\Policies\BrandPolicy',
        'App\Models\Category'           => 'App\Policies\CategoryPolicy',
        'App\Models\Certificate'        => 'App\Policies\CertificatePolicy',
        'App\Models\Client'             => 'App\Policies\ClientPolicy',
        'App\Models\ContactForm'        => 'App\Policies\ContactFormPolicy',
        'App\Models\FavoriteProduct'    => 'App\Policies\FavoriteProductPolicy',
        'App\Models\Order'              => 'App\Policies\OrderPolicy',
        'App\Models\OrderItems'         => 'App\Policies\OrderItemPolicy',
        'App\Models\Partner'            => 'App\Policies\PartnerPolicy',
        'App\Models\Portfolio'          => 'App\Policies\PortfolioPolicy',
        'App\Models\Product'            => 'App\Policies\ProductPolicy',
        'App\Models\ProductFeature'     => 'App\Policies\ProductFeaturePolicy',
        'App\Models\ProductPhotos'      => 'App\Policies\ProductPhotoPolicy',
        'App\Models\Services'           => 'App\Policies\ServicesPolicy',
        'App\Models\Slider'             => 'App\Policies\SliderPolicy',
        'App\Models\Image'              => 'App\Policies\ImagePolicy',
        'App\Models\Lang'               => 'App\Policies\LangPolicy',
        'App\Models\Settings'           => 'App\Policies\SettingsPolicy',
        'App\Models\Translations'       => 'App\Policies\TranslationsPolicy',
        //Resources\Video, Comment və Faq resource-ları var (admində görünmür) və saytda istifadə olunmurlar
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
