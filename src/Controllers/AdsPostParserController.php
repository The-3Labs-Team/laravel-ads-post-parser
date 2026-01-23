<?php

namespace The3LabsTeam\AdsPostParser\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdsPostParserController extends Controller
{
    /**
     * Get preview HTML for ads post parser
     */
    public function getPreviewHtml(Request $request): JsonResponse
    {
        $rawHtml = $request->get('raw_html', '');
        $rawHtml = $this->parseShortcodesToHtml($rawHtml);

        $parser = new \The3LabsTeam\AdsPostParser\AdsPostParser($rawHtml);
        $parsedHtml = $parser->appendAdvertising(customHtml: '<small>[ADV PREVIEW]</small>');

        $parsedHtml = $this->parseHtmlToShortcodes($parsedHtml);

        return response()->json($parsedHtml);
    }

    /**
     * Convert shortcodes in HTML with data-shortcode attribute
     *
     * ex: [index] => <div data-shortcode="[index]"></div>
     */
    protected function parseShortcodesToHtml(string $html): string
    {
        $shortcodeRegex = '/\[(\w+)([^\]]*)\](?:([^\[]*?)\[\/\1\])?/';
        preg_match_all($shortcodeRegex, $html, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $shortcodeName = $match[1];
            $shortcodeFull = $match[0];

            $tag = config("ads-post-parser.shortcode_tags.$shortcodeName", 'div');

            // Sostituisco lo shortcode con un small che ha data-shortcode
            $replacement = '<'.$tag.' data-shortcode="'.htmlspecialchars($shortcodeFull).'"></'.$tag.'>';
            $html = str_replace($shortcodeFull, $replacement, $html);
        }

        return $html;
    }

    /**
     * Convert element with data-shortcode back to shortcode
     *
     * ex: <* data-shortcode="[index]"></*> => [index]
     */
    protected function parseHtmlToShortcodes(string $html): string
    {
        $dom = \voku\helper\HtmlDomParser::str_get_html($html);
        $elements = $dom->find('[data-shortcode]');

        foreach ($elements as $element) {
            // Trova il tag precedente saltando i text nodes (#text)
            $previousTag = $element->previousSibling();
            while ($previousTag && $previousTag->tag === '#text') {
                $previousTag = $previousTag->previousSibling();
            }

            if ($previousTag && $previousTag->tag === 'p' && trim($previousTag->innerHtml()) === '') {
                $previousTag->outertext = '';
            }

            $shortcode = htmlspecialchars_decode($element->getAttribute('data-shortcode'));
            $element->outertext = '<p>'.$shortcode.'</p>';
        }

        return $dom->innerHtml();
    }
}
