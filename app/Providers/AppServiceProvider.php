<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Brand;
use App\Product;
use DB;
use Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {       
        // $data['brands'] = Product::join('brands','brands.id','=','products.brand_id')
        // ->where('brands.status',1)
        // ->select('brands.id','brands.name',DB::raw('sum(products.amount_of) as amount_of_brand'))
        // ->groupBy('brands.id','brands.name')
		// ->orderBy('brands.id')
        // ->get();
        $data['brands'] = Brand::where('brands.status',1)
        ->select('brands.id','brands.name','brands.image')
        ->get();
        view()->share($data);

        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money); ?>";
});
}
}