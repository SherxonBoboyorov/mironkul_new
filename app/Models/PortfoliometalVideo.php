<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfoliometalVideo extends Model
{
    use HasFactory;

    protected $table = 'portfoliometal_videos';

    protected $fillable = [
        'portfoliometal_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public function portfoliometal()
    {
        return $this->belongsTo(Portfoliometal::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/portfoliometalvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/portfoliometalvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $portfoliometalvideo): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $portfoliometalvideo->video)) {
                File::delete(public_path() . $portfoliometalvideo->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/portfoliometalvideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/portfoliometalvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $portfoliometalvideo->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioportfoliometalvideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliometalvideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfoliometalvideoimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfoliometalvideoimage->image)) {
                File::delete(public_path() . $portfoliometalvideoimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfoliometalvideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliometalvideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfoliometalvideoimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfoliometalvideoimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfoliometalvideoimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
