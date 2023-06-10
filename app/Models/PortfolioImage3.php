<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class PortfolioImage3 extends Model
{
    use HasFactory;

    protected $table = 'portfolio_image3s';

    protected $fillable = [
        'portfolio3_id',
        'image'
    ];

    public function portfolio3()
    {
        return $this->belongsTo('App\Models\Portfolio3', 'portfolio3_id');
    }


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage3/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage3/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $portfolioimage3): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $portfolioimage3->image)) {
                File::delete(public_path() . $portfolioimage3->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/portfolioimage3/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/portfolioimage3/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $portfolioimage3->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/portfolioimage3/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/portfolioimage3/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }

}
