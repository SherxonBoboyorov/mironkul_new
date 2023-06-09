<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product2 extends Model
{
    use HasFactory;

    protected $table = 'product2s';

    protected $fillable = [
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'slug_ru',
        'slug_uz',
        'slug_en',
        'info_ru',
        'info_uz',
        'info_en',
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


    // public function product_image1s() {
    //     return $this->hasMany(ProductImage1::class, 'id', 'product2_id');
    // }


    // public function product2_videos()
    // {
    //     return $this->hasMany(ProductVideo1::class, 'id', 'product2_id');
    // }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/product2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/product2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $product2): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $product2->image)) {
                File::delete(public_path() . $product2->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/product2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/product2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $product2->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/product2/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/product2/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
