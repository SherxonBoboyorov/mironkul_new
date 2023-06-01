<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\PortfolioVideoController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductVideoController;
use App\Http\Controllers\Admin\VideoController;
use UniSharp\Laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\AboutController; 




Auth::routes();

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->prefix('dashboard')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'options' => OptionsController::class,
        'product' => ProductController::class,
        'productimage' => ProductImageController::class,
        'productvideo' => ProductVideoController::class,
        'portfolio' => PortfolioController::class,
        'portfolioimage' => PortfolioImageController::class,
        'portfoliovideo' => PortfolioVideoController::class,
        'page' => PageController::class,
        'photo' => PhotoController::class,
        'video' => VideoController::class,
        'presentation' => PresentationController::class,
        'office' => OfficeController::class,
        'category' => CategoryController::class,
        'categorytype' => CategoryTypeController::class
    ]);
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
         Route::get('/', [IndexController::class, 'homepage'])->name('/');
         Route::get('about', [AboutController::class, 'aboutCompany'])->name('about');
         Route::get('aboutCompanyPhotos', [AboutController::class, 'aboutCompanyPhoto'])->name('aboutCompanyPhotos');
         Route::get('aboutCompanyPhotos/{slug}', [AboutController::class, 'show'])->name('aboutCompanyPhoto');
 });



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});


