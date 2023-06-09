<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductImage1 extends Model
{
    use HasFactory;

    protected $table = 'product_image1s';

    protected $fillable = [
        'product1_id',
        'image'
    ];

    
    public function product1()
    {
        return $this->belongsTo('App\Models\Product1', 'product1_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $productimage1): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $productimage1->image)) {
                File::delete(public_path() . $productimage1->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $productimage1->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/productimage1/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/productimage1/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
