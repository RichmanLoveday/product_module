<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //? Gate to check if the user can edit the product
        Gate::define('can-edit-product', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });

        //? Gate to check if the user can delete the product
        Gate::define('can-delete-product', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });
    }
}
