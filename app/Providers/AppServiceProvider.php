<?php

namespace App\Providers;

use App\Category;
use App\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $uril=$request->segment(1);
        View::share('uril',$uril);

        $leftAdds=DB::table('leftadds')->orderBy('id','desc')->where('status','published')->paginate(10);
        View::share('leftAdds',$leftAdds);

        $rightAdds=DB::table('rightadds')->orderBy('id','desc')->where('status','published')->paginate(10);

        View::share('rightAdds',$rightAdds);

        $selectedCategory=Category::where('select_status','selected')->first();

        View::share('selectedCategory',$selectedCategory);

        $selectedFooter=Footer::where('status','published')->first();

        View::share('selectedFooter',$selectedFooter);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
