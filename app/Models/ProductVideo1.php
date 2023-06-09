<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductVideo1 extends Model
{
    use HasFactory;

    protected $table = 'product_video1s';

    protected $fillable = [
        'product1_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public function product1()
    {
        return $this->belongsTo(Product1::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo1/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo1/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $productvideo1): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $productvideo1->video)) {
                File::delete(public_path() . $productvideo1->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo1/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo1/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $productvideo1->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $videoimage1): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $videoimage1->image)) {
                File::delete(public_path() . $videoimage1->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage1/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage1/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $videoimage1->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/videoimage1/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/videoimage1/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
