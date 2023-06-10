<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductVideo2 extends Model
{
    use HasFactory;

    protected $table = 'product_video2s';

    protected $fillable = [
        'product2_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public function product2()
    {
        return $this->belongsTo(Product2::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo2/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo2/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $productvideo2): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $productvideo2->video)) {
                File::delete(public_path() . $productvideo2->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/productvideo2/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/productvideo2/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $productvideo2->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $videoimage2): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $videoimage2->image)) {
                File::delete(public_path() . $videoimage2->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/videoimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/videoimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $videoimage2->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/videoimage2/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/videoimage2/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }

}
