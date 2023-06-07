<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class MetalVideo extends Model
{
    use HasFactory;

    protected $table = 'metal_videos';

    protected $fillable = [
        'metal_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];


    public function metal()
    {
        return $this->belongsTo(Metal::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/metalvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/metalvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $metalvideo): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $metalvideo->video)) {
                File::delete(public_path() . $metalvideo->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/metalvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/metalvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $metalvideo->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/metalvideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/metalvideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $metalvideoimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $metalvideoimage->image)) {
                File::delete(public_path() . $metalvideoimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/metalvideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/metalvideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $metalvideoimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/metalvideoimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/metalvideoimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }


}
