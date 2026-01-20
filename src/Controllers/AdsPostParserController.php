<?php

namespace The3LabsTeam\AdsPostParser\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdsPostParserController extends Controller
{
    /**
     * Get preview HTML for ads post parser
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getPreviewHtml(Request $request): JsonResponse
    {
        $rawHtml = $request->get('raw_html', '');
        
        $parser = new \The3LabsTeam\AdsPostParser\AdsPostParser($rawHtml);
        $parsedHtml = $parser->appendAdvertising(customHtml: '<small>[ADV PREVIEW]</small>');

        return response()->json($parsedHtml);
    }
}
