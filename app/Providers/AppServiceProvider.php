<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\OfferImage;
use App\Models\Product;
use App\Models\Setting;
use Nette\Schema\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share(["AllCategory" => Category::all(), "AllProduct" => Product::all(), "AllSetting" => Setting::findOrFail(1), "offerimage" => OfferImage::all()]);
    }
}
