<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfolioImage2 extends Model
{
    use HasFactory;

    protected $table = 'portfolio_image2s';

    protected $fillable = [
        'portfolio2_id',
        'image'
    ];

    public function portfolio2()
    {
        return $this->belongsTo('App\Models\Portfolio2', 'portfolio2_id');
    }


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfolioimage2): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfolioimage2->image)) {
                File::delete(public_path() . $portfolioimage2->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage2/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage2/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfolioimage2->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfolioimage2/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfolioimage2/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
