<?php

namespace The3LabsTeam\AdsPostParser;

use Illuminate\Support\Facades\Blade;
use voku\helper\HtmlDomParser;

class AdsPostParser
{
    public string $blacklistBefore;

    public string $blacklistAfter;

    public $dom;

    public string $content;

    /**
     * AdsPostParser constructor.
     */
    public function __construct(string $content)
    {
        $this->blacklistBefore = config('ads-post-parser.blacklist.before');
        $this->blacklistAfter = config('ads-post-parser.blacklist.after');
        $this->dom = HtmlDomParser::str_get_html("<div id='adv__parsed__content'>$content</div>");
        $this->content = $content;
    }

    /**
     * Append all the advertising
     */
    public function appendAdvertising(): string
    {
        $thresholds = config('ads-post-parser.thresholds');
        $items = $this->dom->find('#adv__parsed__content > *');
        $adsCount = 0;

        foreach ($items as $index => $item) {
            // === BLACKLIST ===
            $blacklist = explode('|', trim($this->blacklistAfter, '/'));

            $currentElement = $item;
            $afterElement = $index < count($items) - 1 ? $items[$index + 1] : null;
            $isBlackList = preg_match('/'.implode('|', $blacklist).'/', $currentElement->outertext) || ($afterElement ? preg_match('/'.implode('|', $blacklist).'/', $afterElement->outertext) : false);
            // === END BLACKLIST ===

            if (in_array($index, $thresholds)) {
                if ($isBlackList) {
                    $thresholds = array_map(function ($value) {
                        return $value + 1;
                    }, $thresholds);

                    continue;
                }

                try {
                    $currentElement->outertext .= Blade::render('ads-post-parser::ads'.array_keys($thresholds)[$adsCount]);
                } catch (\Exception $e) {
                    // Content without ADV
                }
                $adsCount++;
            }
        }

        return $this->dom->save();
    }

    public function oldappendAdvertising(): string
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

        $beforeItem = $items[$index];
        $nextItem = $index < $maxLoop - 1 ? $items[$index + 1] : null;

        if (
            ! preg_match($this->blacklistBefore, $beforeItem->outertext) && ($nextItem === null || ! preg_match($this->blacklistAfter, $nextItem->outertext))
        ) {
            try {
                echo $index.' - '.$advIndex.'<br>';
                $beforeItem->outertext .= Blade::render('ads-post-parser::ads'.$advIndex);
            } catch (\Exception $e) {
                // Content without ADV
            }

        } else {
            $this->appendSingleAdvertising($index + 1, $advIndex);
        }

        return $this->dom->save();
    }
}
