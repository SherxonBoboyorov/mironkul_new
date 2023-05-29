<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Presentation extends Model
{
    use HasFactory;

    protected $table = 'presentations';

    protected $fillable = [
        'file',
        'title_ru',
        'title_uz',
        'title_en',
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('file')) {

            self::checkDirectory();

            $request->file('file')
                ->move(
                    public_path() . '/upload/presentation/' . date('d-m-Y'),
                    $request->file('file')->getClientOriginalName()
                );
            return '/upload/presentation/' . date('d-m-Y') . '/' . $request->file('file')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $presentation): string
    {
        if ($request->hasFile('file')) {
            if (File::exists(public_path() . $presentation->file)) {
                File::delete(public_path() . $presentation->file);
            }

            self::checkDirectory();

            $request->file('file')
                ->move(
                    public_path() . '/upload/presentation/' . date('d-m-Y'),
                    $request->file('file')->getClientOriginalName()
                );
            return '/upload/presentation/' . date('d-m-Y') . '/' . $request->file('file')->getClientOriginalName();
        }

        return $presentation->file;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/presentation/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/presentation/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }

}
