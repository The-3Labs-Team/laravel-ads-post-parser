<?php

namespace The3LabsTeam\AdsPostParser;

use voku\helper\HtmlDomParser;
use voku\helper\SimpleHtmlDomNode;

class AdsPostParser
{
    public string $content;
    public SimpleHtmlDomNode $paragraphs;
    public int $numberOfParagraphs;
    public int $numberOfAds;
    public string $blacklist;

    public function __construct(string $content)
    {
        $this->blacklist = config('ads-post-parser.blacklist');
        $this->content = $content;
        $this->parse();
        $this->numberOfParagraphs = $this->calculateParagraphs();
        $this->numberOfAds = $this->calculateNumberOfAds();
    }

    /**
     * Parse the content, find the paragraphs and store them in the object
     */
    public function parse(): void
    {
        $dom = HtmlDomParser::str_get_html($this->content);
        $this->paragraphs = $dom->find('p');
    }

    /**
     * Calculate the number of paragraphs in the content
     *
     * @return int
     */
    public function calculateParagraphs(): int
    {
        foreach ($this->paragraphs as $key => $paragraph) {
            if (preg_match($this->blacklist, $paragraph->innertext)) {
                unset($this->paragraphs[$key]);
            }
        }
        $this->numberOfParagraphs = count($this->paragraphs);
        return $this->numberOfParagraphs;
    }

    /**
     * Calculate the number of ads to render
     *
     * @return int
     */
    public function calculateNumberOfAds(): int
    {
        $numberOfAds = 0;
        $tresholds = config('ads-post-parser.tresholds');
        foreach ($tresholds as $treshold => $ads) {
            if ($this->numberOfParagraphs >= $treshold) {
                $numberOfAds = $ads;
            }
        }
        return $numberOfAds;
    }


    public function appendAds(array $adCodes): string
    {
        $ads = '';
        $adPosition = 1;
        $paragraphIndex = 0;
        foreach ($this->paragraphs as $paragraph) {
            // Skip blacklisted paragraphs
            if (preg_match($this->blacklist, $paragraph->innertext)) {
                continue;
            }

            // Append an ad if the current paragraph is in the right position
            if ($adPosition <= $this->numberOfAds) {
                $adCode = $adCodes[$adPosition - 1];
                $adParagraph = HtmlDomParser::str_get_html("<p>$adCode</p>");
                $ads .= $adParagraph;
                $adPosition++;
            }

            $ads .= $paragraph;
            $paragraphIndex++;

            // Stop adding ads if we reached the end of the content or added all the ads
            if ($paragraphIndex >= $this->numberOfParagraphs || $adPosition > $this->numberOfAds) {
                break;
            }
        }

        // Append any remaining ads to the end of the content
        if ($adPosition <= $this->numberOfAds) {
            for ($i = $adPosition - 1; $i < $this->numberOfAds; $i++) {
                $adCode = $adCodes[$i];
                $adParagraph = HtmlDomParser::str_get_html("<p>$adCode</p>");
                $ads .= $adParagraph;
            }
        }

        return $ads;
    }



}