<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'video',
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'slug_ru',
        'slug_uz',
        'slug_en'
    ];


    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/video/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/video/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $video): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $video->video)) {
                File::delete(public_path() . $video->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/video/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/video/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $video->video;
    }


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/images/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/images/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $images): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $images->image)) {
                File::delete(public_path() . $images->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/images/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/images/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $images->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/images/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/images/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
