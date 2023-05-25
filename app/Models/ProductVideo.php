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
        'video'
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
            return '/upload/productvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalExtension();
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
                    $request->file('video')->getClientOriginalExtension()
                );
            return '/upload/productvideo/' . date('d-m-Y') . '/' . $request->file('video')->getClientOriginalExtension();
        }

        return $productvideo->video;
    }
}
