<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Services\Parsers\Rbc\RbcParseService;
use App\Services\Parsers\Rbc\RbcParser;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

/**
 * Class NewsController
 *
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * @param string $id
     *
     * @return View
     */
    public function item(string $id) : View
    {
        $data = app((RbcParseService::class))->find($id);

        return view('news.item', $data);
    }

    /**
     * @return View
     */
    public function list() : View
    {
        $data = app((RbcParseService::class))->all();

        return view('news.list', $data);
    }

    /**
     * @return JsonResponse
     */
    public function parse() : JsonResponse
    {
        $data = (new RbcParser)->parse();

        return response()->json([
            'status'  => true,
            'message' => 'success',
            'news'    => $data,
        ]);
    }
}
