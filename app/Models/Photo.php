<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $fillable  = [
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'slug_ru',
        'slug_uz',
        'slug_en'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/photo/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/photo/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $photo): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $photo->image)) {
                File::delete(public_path() . $photo->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/photo/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/photo/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $photo->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/photo/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/photo/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
