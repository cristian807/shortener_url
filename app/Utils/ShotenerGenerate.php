<?php
namespace App\Utils;

use App\Models\Shortener;
use Illuminate\Support\Str;

class ShotenerGenerate{
    public static function generateCode() {
        $numRandom=5;
        $code=Str::random($numRandom);
        $response=Shortener::where('code_url',$code)->first();
        if ($response) {
            $code=Str::random($numRandom);
        }
        return $code;
    }

    public static function generateNewUrl($code) {
        return app()->make('url')->to($code);
    }
}
