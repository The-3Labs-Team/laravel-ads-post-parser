<?php

use The3LabsTeam\AdsPostParser\AdsPostParser;

beforeEach(function () {
    $this->content = <<<'HTML'
    <p>Paragraph1</p>
    <p>Paragraph2</p>
    <p>Paragraph3</p>
    <img src="https://example.com/image.jpg" alt="Image">
    <p>Paragraph4</p>
    <div><p>Paragraph5</p></div>
    <div><p>[shortcode]</p></div>
    <p>Paragraph6</p>
    <p><img src="https://example.com/image.jpg" alt="Image"></p>
    <p>Paragraph7</p>
    <p>Paragraph8</p>
    <p>Paragraph9</p>
    <p>Paragraph10</p>
    <p>Paragraph11</p>
    <p>Paragraph12</p>
    HTML;
});

it('can append advertising', function () {
    $content = (new AdsPostParser($this->content))->appendAdvertising();

    expect($content)
        ->toContain('YOUR AD1 HERE')
        ->toContain('YOUR AD2 HERE')
        ->toContain('YOUR AD3 HERE')
        ->toContain('YOUR AD4 HERE');
});

it('can append single advertising', function () {
    $content = (new AdsPostParser($this->content))
        ->appendSingleAdvertising(2, 1);
    expect($content)->toContain('YOUR AD1 HERE');
});

//it('can remove wrapping div', function () {
//    $content = (new AdsPostParser($this->content))->appendAdvertising()->removeWrappingDiv();
//    expect($content)->not()->toContain('<div id="adv__parsed__content">');
//});
