<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CategoryType extends Model
{
    use HasFactory;

    protected $table = 'category_types';

    protected $fillable = [
        'category_id',
        'image', 
        'title_ru',
        'title_uz',
        'title_en'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/categorytype/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/categorytype/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $categorytype): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $categorytype->image)) {
                File::delete(public_path() . $categorytype->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/categorytype/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/categorytype/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $categorytype->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/categorytype/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/categorytype/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
