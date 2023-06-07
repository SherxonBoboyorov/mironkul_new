<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MetalController;
use App\Http\Controllers\Admin\MetalImageController;
use App\Http\Controllers\Admin\MetalVideoController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\PortfoliometalController;
use App\Http\Controllers\Admin\PortfolioVideoController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductVideoController;
use App\Http\Controllers\Admin\VideoController;
use UniSharp\Laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ParfolioController;

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
        'categorytype' => CategoryTypeController::class,
        'metal' => MetalController::class,
        'metalimage' => MetalImageController::class,
        'metalvideo' => MetalVideoController::class,
        'portfoliometal' => PortfoliometalController::class
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
         Route::get('aboutCompanyVideos', [AboutController::class, 'aboutCompanyVideo'])->name('aboutCompanyVideos');
         Route::get('presentations', [AboutController::class, 'aboutCompanyPresentation'])->name('presentations');
         Route::get('contact', [ContactController::class, 'contact'])->name('contact');
         Route::post('save_yourSave', [ContactController::class, 'yourSave'])->name('yourSave');
         Route::get('products', [BlogController::class, 'products'])->name('products');
         Route::get('products/{slug}', [BlogController::class, 'show'])->name('product');
         Route::get('portfolios', [ParfolioController::class, 'portfolios'])->name('portfolios');
         Route::get('portfolios/{slug}', [ParfolioController::class, 'show'])->name('portfolio');


 });



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});


