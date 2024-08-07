<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShotenerStore;
use App\Services\ShotenerServices;
use Inertia\Inertia;

class ShotenerController extends Controller
{
    /**
     * @OA\Get(
     *  path="/shortener/create",
     *  tags={"shortener view"},
     *  description="Devuelve la vista para recortar las URLs.",
     *  @OA\Response(
     *      response=302,
     *      description="Vista principal obtenida."
     *  )
     * )
    */
    public function create()  {
        return Inertia::render('ShotenerCreate');
    }

    /**
     * @OA\Post(
     *  path="/shortener/store",
     *  tags={"Shortener URLs"},
     *  description="Permite guardar la URL original y genera una nueva acortada.",
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="origin_url",
     *                     description="URL a acortar.",
     *                     type="string",
     *                 ),
     *             ),
     *         ),
     *  ),
     * @OA\Response(
     *      response=302,
     *      description="Redireccion a la vista principal index con el listado de URLs o si hay errores de validacion devuelve la vista presente con estos errores."
     *  ),
     * )
    */
    public function store(ShotenerStore $request) {
        return ShotenerServices::save($request);
    }

    /**
     * @OA\Delete(
     *  path="/shortener/destroy/{shortener_code}",
     *  tags={"shortener delete"},
     *  description="Elimina un registro (url shortener).",
     *  @OA\Parameter(
     *        name="shortener",
     *        in="path",
     *        description="Identificador unico de la URL origen.",
     *        required=true,
     *        @OA\Schema(
     *            type="string"
     *        )
     *   ),
     *  @OA\Response(
     *      response=302,
     *      description="Redireccionado a la pagina principal, con el mensaje: Registro eliminado exitosamente."
     *  )
     * )
    */

    public function destroy($shotener) {
        return ShotenerServices::destroy($shotener);
    }

    /**
     * @OA\Get(
     *  path="/shortener/redirect/{code_url}",
     *  tags={"shortener redirect"},
     *  description="Redirecciona a la Url destino.",
     *  @OA\Parameter(
     *      name="code_url",
     *      in="path",
     *      description="Identificador unico de la URL origen.",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *      ),
     *  ),
     *  @OA\Response(
     *      response=302,
     *      description="Redireccionando a la URL destino."
     *  )
     * )
    */
    public function redirect($request) {
        return ShotenerServices::redirect($request);
    }


}
