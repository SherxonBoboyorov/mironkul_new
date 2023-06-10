<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductImage2 extends Model
{
    use HasFactory;

    protected $table = 'product_image2s';

    protected $fillable = [
        'product2_id',
        'image'
    ];

    
    public function product2()
    {
        return $this->belongsTo('App\Models\Product2', 'product2_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $productimage2): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $productimage2->image)) {
                File::delete(public_path() . $productimage2->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/productimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/productimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $productimage2->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/productimage2/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/productimage2/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
