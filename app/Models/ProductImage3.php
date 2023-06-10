<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductImage3 extends Model
{
    use HasFactory;

    protected $table = 'product_image3s';

    protected $fillable = [
        'product3_id',
        'image'
    ];

    
    public function product3()
    {
        return $this->belongsTo('App\Models\Product3', 'product3_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage3/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage3/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $productimage3): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $productimage3->image)) {
                File::delete(public_path() . $productimage3->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage3/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage3/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $productimage3->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/productimage3/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/productimage3/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
