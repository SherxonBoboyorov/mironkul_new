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
}
