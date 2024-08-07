<?php

namespace App\Http\Controllers;

use App\Models\Shortener;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * @OA\Get(
     *  path="/",
     *  tags={"Index"},
     *  description="Devuelve la vista con el listado de las URLs acortadas.",
     *  @OA\Response(
     *         response=200,
     *         description="Vistra principal con el listado de URLs Shortener.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="code_url", type="string", example="Khghj"),
     *                 @OA\Property(property="origin_url", type="string", example="https://example-shortener-url.com"),
     *                 @OA\Property(property="new_url", type="string", example="localhost:8000/Khghj"),
     *             )
     *         )
     *     ),
     * )
    */
    public function index() : Response {
        $data=Shortener::all();
        return Inertia::render('Welcome',[
            'shorteners' => $data,
        ]);
    }
}
