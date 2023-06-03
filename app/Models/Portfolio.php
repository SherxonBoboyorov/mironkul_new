<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'category_id',
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'slug_ru',
        'slug_uz',
        'slug_en',
        'description_ru',
        'description_uz',
        'description_en',
        'meta_title_ru',
        'meta_title_uz',
        'meta_title_en',
        'meta_description_ru', 
        'meta_description_uz',
        'meta_description_en'
    ];

    public function portfolio_images()
    {
        return $this->hasMany(PortfolioImage::class);
    }


    public function portfolio_videos()
    {
        return $this->hasMany(PortfolioVideo::class);
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolio/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolio/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfolio): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfolio->image)) {
                File::delete(public_path() . $portfolio->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolio/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolio/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfolio->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfolio/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfolio/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
