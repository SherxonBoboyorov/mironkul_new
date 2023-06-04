<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image'
    ];

    
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $productimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $productimage->image)) {
                File::delete(public_path() . $productimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $productimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/productimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/productimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
