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
    $previousItem = $index > 0 ? $items[$index - 1] : null;

    if (
        ! preg_match($this->blacklist, $currentItem->outertext) &&
        (! $previousItem || ! preg_match($this->blacklist, $previousItem->outertext)) &&
        strip_tags($currentItem->outertext) !== ''
    ) {
        $currentItem->outertext .= Blade::render('ads-post-parser::ads'.$advIndex);
    }
    else {
        // Se l'elemento corrente o il precedente è in blacklist, cerca il prossimo elemento non in blacklist
        for ($nextIndex = $index + 1; $nextIndex < $maxLoop; $nextIndex++) {
            $nextItem = $items[$nextIndex];
            if (! preg_match($this->blacklist, $nextItem->outertext) && strip_tags($nextItem->outertext) !== '') {
                $nextItem->outertext .= Blade::render('ads-post-parser::ads'.$advIndex);
                break;
            }
        }
    }

    return $this->dom->save();
}
    /**
     * Remove the wrapping div
     */
    public function removeWrappingDiv(): string
    {
        $contentDiv = $this->dom->find('#adv__parsed__content', 0);
        $html = $contentDiv->save();

        return $html;
    }
}
