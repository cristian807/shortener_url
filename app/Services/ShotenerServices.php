<?php

namespace App\Services;

use App\Models\Shortener;
use App\Utils\ShotenerGenerate;

class ShotenerServices{

    public static function save($request){
        $code_url=ShotenerGenerate::generateCode();
        Shortener::create([
            'code_url'=>$code_url,
            'origin_url'=>$request->origin_url,
            'new_url'=>ShotenerGenerate::generateNewUrl($code_url),
        ]);
        return redirect()->route('shortener')->with('message','URLs acortada exitosamente.');
    }

    public static function destroy($request){
        $result=Shortener::find($request);
        $result->delete();
        return redirect()->route('shortener')->with('message','Registro eliminado exitosamente.');
    }

    public static function redirect($request) {
        $result=Shortener::where('code_url', $request)->first();

        if ($result) {
            return redirect()->secure(url($result->origin_url));
        }

        return redirect()->route('shortener')->with('message','No se encontró una URL acortada con el código proporcionado.');
    }
}
