<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductVideo extends Model
{
    use HasFactory;

    protected $table = 'product_videos';

    protected $fillable = [
        'product_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $productvideo): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $productvideo->video)) {
                File::delete(public_path() . $productvideo->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $productvideo->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $videoimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $videoimage->image)) {
                File::delete(public_path() . $videoimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $videoimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/videoimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/videoimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
