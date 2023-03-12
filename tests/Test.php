<?php

use The3LabsTeam\AdsPostParser\AdsPostParser;

$content = <<<'HTML'
<p>Paragraph</p>
<p>Paragraph</p>
<p>Paragraph</p>
<img src="https://example.com/image.jpg" alt="Image">
<p>Paragraph</p>
<div><p>Paragraph</p></div>
<div><p>[shortcode]</p></div>
<p>Paragraph</p>
<p><img src="https://example.com/image.jpg" alt="Image"></p>

HTML;

it('can calculate the number of paragraphs', function () use ($content) {
    $parser = new AdsPostParser($content);
    expect($parser->numberOfParagraphs)->toBe(6);
});

it('can calculate the number of ads to render', function () use ($content) {
    $parser = new AdsPostParser($content);
    expect($parser->calculateNumberOfAds())->toBe(1);
});

it(' can append the ads to the content', function () use ($content) {
    $parser = new AdsPostParser($content);
    $parser->appendAds(['<p>Ad</p>']);
    expect($parser->content)->toContain('<p>Ad</p>');
});
