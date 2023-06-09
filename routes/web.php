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
use App\Http\Controllers\Admin\Portfolio1Controller;
use App\Http\Controllers\Admin\Portfolio2Controller;
use App\Http\Controllers\Admin\Portfolio3Controller;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioImage1Controller;
use App\Http\Controllers\Admin\PortfolioImage2Controller;
use App\Http\Controllers\Admin\PortfolioImage3Controller;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\PortfoliometalController;
use App\Http\Controllers\Admin\PortfoliometalImageController;
use App\Http\Controllers\Admin\PortfoliometalVideoController;
use App\Http\Controllers\Admin\PortfolioVideo1Controller;
use App\Http\Controllers\Admin\PortfolioVideo2Controller;
use App\Http\Controllers\Admin\PortfolioVideo3Controller;
use App\Http\Controllers\Admin\PortfolioVideoController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\Product1Controller;
use App\Http\Controllers\Admin\Product2Controller;
use App\Http\Controllers\Admin\Product3Controller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImage1Controller;
use App\Http\Controllers\Admin\ProductImage2Controller;
use App\Http\Controllers\Admin\ProductImage3Controller;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductVideo1Controller;
use App\Http\Controllers\Admin\ProductVideo2Controller;
use App\Http\Controllers\Admin\ProductVideo3Controller;
use App\Http\Controllers\Admin\ProductVideoController;
use App\Http\Controllers\Admin\VideoController;
use UniSharp\Laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\Blog1Controller;
use App\Http\Controllers\Front\Blog2Controller;
use App\Http\Controllers\Front\Blog3Controller;
use App\Http\Controllers\Front\Blog4Controller;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ParfolioController;
use App\Http\Controllers\Front\Partfolio1Controller;
use App\Http\Controllers\Front\Partfolio2Controller;
use App\Http\Controllers\Front\Partfolio3Controller;
use App\Http\Controllers\Front\Partfolio4Controller;

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
        'portfoliometal' => PortfoliometalController::class,
        'portfoliometalimage' => PortfoliometalImageController::class,
        'portfoliometalvideo' => PortfoliometalVideoController::class,
        'product1' => Product1Controller::class,
        'productimage1' => ProductImage1Controller::class,
        'productvideo1' => ProductVideo1Controller::class,
        'portfolio1' => Portfolio1Controller::class,
        'portfolioimage1' => PortfolioImage1Controller::class,
        'portfoliovideo1' => PortfolioVideo1Controller::class,
        'product2' => Product2Controller::class,
        'productimage2' => ProductImage2Controller::class,
        'productvideo2' => ProductVideo2Controller::class,
        'portfolio2' => Portfolio2Controller::class,
        'portfolioimage2' => PortfolioImage2Controller::class,
        'portfoliovideo2' => PortfolioVideo2Controller::class,
        'product3' => Product3Controller::class,
        'productimage3' => ProductImage3Controller::class,
        'productvideo3' => ProductVideo3Controller::class,
        'portfolio3' => Portfolio3Controller::class,
        'portfolioimage3' => PortfolioImage3Controller::class,
        'portfoliovideo3' => PortfolioVideo3Controller::class
        
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
         Route::get('products1', [Blog1Controller::class, 'products1'])->name('products1');
         Route::get('products1/{slug}', [Blog1Controller::class, 'show'])->name('product1');
         Route::get('portfolios1', [Partfolio1Controller::class, 'portfolios1'])->name('portfolios1');
         Route::get('portfolios1/{slug}', [Partfolio1Controller::class, 'show'])->name('portfolio1');
         Route::get('products2', [Blog2Controller::class, 'products2'])->name('products2');
         Route::get('products2/{slug}', [Blog2Controller::class, 'show'])->name('product2');
         Route::get('portfolios2', [Partfolio2Controller::class, 'portfolios2'])->name('portfolios2');
         Route::get('portfolios2/{slug}', [Partfolio2Controller::class, 'show'])->name('portfolio2');

         Route::get('products3', [Blog3Controller::class, 'products3'])->name('products3');
         Route::get('products3/{slug}', [Blog3Controller::class, 'show'])->name('product3');
         Route::get('portfolios3', [Partfolio3Controller::class, 'portfolios3'])->name('portfolios3');
         Route::get('portfolios3/{slug}', [Partfolio3Controller::class, 'show'])->name('portfolio3');

         Route::get('products4', [Blog4Controller::class, 'products4'])->name('products4');
         Route::get('products4/{slug}', [Blog4Controller::class, 'show'])->name('product4');
         Route::get('portfolios4', [Partfolio4Controller::class, 'portfolios4'])->name('portfolios4');
         Route::get('portfolios4/{slug}', [Partfolio4Controller::class, 'show'])->name('portfolio4');


 });



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});


