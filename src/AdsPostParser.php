<?php

namespace The3LabsTeam\AdsPostParser;

use Illuminate\Support\Facades\Blade;
use voku\helper\HtmlDomParser;

class AdsPostParser
{
    public string $blacklist;

    public $dom;

    public string $content;

    /**
     * AdsPostParser constructor.
     */
    public function __construct(string $content)
    {
        $this->blacklist = config('ads-post-parser.blacklist');
        $this->dom = HtmlDomParser::str_get_html("<div id='adv__parsed__content'>$content</div>");
        $this->content = $content;
    }

    /**
     * Append all the advertising
     */
    public function appendAdvertising(): string
    {
        $thresholds = config('ads-post-parser.thresholds');

        foreach ($thresholds as $advIndex => $threshold) {
            $this->appendSingleAdvertising(
                (int) $threshold,
                (int) $advIndex
            );
        }

        return $this->dom->save();
    }

    /**
     * Append a single advertising
     */
public function appendSingleAdvertising(int $index, int $advIndex): string
{
    $items = $this->dom->find('#adv__parsed__content > *');
    $maxLoop = count($items);

    if ($index >= $maxLoop) {
        return $this->dom->save();
    }

    $currentItem = $items[$index];
    $nextItem = $items[$index + 1] ?? null;

    static $adIndices = [];

    if (in_array($index, $adIndices)) {
        return $this->appendSingleAdvertising($index + 1, $advIndex);
    }

    // Verifica se l'elemento corrente contiene effettivamente dell'HTML
    if (
        ! preg_match($this->blacklist, $currentItem->outertext) &&
        (! $nextItem || ! preg_match($this->blacklist, $nextItem->outertext)) &&
        (! $nextItem || preg_match('/<\w+/', $nextItem->outertext)) &&
        strip_tags($currentItem->outertext) !== '' // Aggiungi questa condizione
    ) {
        $currentItem->outertext .= Blade::render('ads-post-parser::ads'.$advIndex);
        $adIndices[] = $index;
    } else {
        $this->appendSingleAdvertising($index + 1, $advIndex);
    }

    return $this->dom->save();
}    /**
     * Remove the wrapping div
     */
    public function removeWrappingDiv(): string
    {
        $contentDiv = $this->dom->find('#adv__parsed__content', 0);
        $html = $contentDiv->save();

        return $html;
    }
}
