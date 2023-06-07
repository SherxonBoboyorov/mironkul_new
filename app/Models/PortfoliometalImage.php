<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfoliometalImage extends Model
{
    use HasFactory;

    protected $table = 'portfoliometal_images';

    protected $fillable = [
        'portfoliometal_id',
        'image'
    ];


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfoliometalimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliometalimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfoliometalimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfoliometalimage->image)) {
                File::delete(public_path() . $portfoliometalimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfoliometalimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfoliometalimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfoliometalimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfoliometalimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfoliometalimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
