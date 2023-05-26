<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $table = 'portfolio_images';

    protected $fillable = [
        'portfolio_id',
        'image'
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfolioimage): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfolioimage->image)) {
                File::delete(public_path() . $portfolioimage->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfolioimage->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfolioimage/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfolioimage/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
