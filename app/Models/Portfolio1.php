<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Portfolio1 extends Model
{
    use HasFactory;


    protected $table = 'portfolio1s';

    protected $fillable = [
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
    
    // public function portfolio_images()
    // {
    //     return $this->hasMany(PortfolioImage::class, 'id', 'portfolio_id');
    // }

    // public function portfolio_videos()
    // {
    //     return $this->hasMany(PortfolioVideo::class, 'id', 'portfolio_id');
    // }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolio1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolio1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfolio1): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfolio1->image)) {
                File::delete(public_path() . $portfolio1->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolio1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolio1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfolio1->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfolio1/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfolio1/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
