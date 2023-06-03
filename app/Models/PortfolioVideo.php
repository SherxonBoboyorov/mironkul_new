<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfolioVideo extends Model
{
    use HasFactory;

    protected $table = 'portfolio_videos';

    protected $fillable = [
        'portfolio_id',
        'image',
        'video',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public static function uploadVideo($request): ?string
    {
        if ($request->hasFile('video')) {

            $request->file('video')
                ->move(
                    public_path() . '/upload/portfoliovideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/portfoliovideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return null;
    }

    public static function updateVideo($request, $portfoliovideo): string
    {
        if ($request->hasFile('video')) {
            if (File::exists(public_path() . $portfoliovideo->video)) {
                File::delete(public_path() . $portfoliovideo->video);
            }

            $request->file('video')
                ->move(
                    public_path() . '/upload/portfoliovideo/' . date('d-m-Y'),
                    $request->file('video')->getClientOriginalName()
                );
            return '/upload/portfoliovideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalName();
        }

        return $portfoliovideo->video;
    }



    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioportfoliovideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliovideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfoliovideoimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfoliovideoimage->image)) {
                File::delete(public_path() . $portfoliovideoimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfoliovideoimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliovideoimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfoliovideoimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfoliovideoimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfoliovideoimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
