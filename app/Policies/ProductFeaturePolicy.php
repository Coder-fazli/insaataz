<?php

namespace App\Policies;

use App\Models\ProductFeature;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductFeaturePolicy
{
    use HandlesAuthorization;

    public $user;
    
    public function __construct()
    {
        $this->user = Auth::guard('web')->user();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        return $this->user->status == 0 ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductFeature $productFeature)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductFeature  $productFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductFeature $productFeature)
    {
        //
    }
}
