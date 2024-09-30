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
    <p>Paragraph13</p>
    <p>Paragraph15</p>
    <p>Paragraph16</p>
    <p>Paragraph17</p>
    <p>Paragraph18</p>
    <p>Paragraph19</p>
    <p>Paragraph20</p>
    HTML;

    $this->smallContent = <<<'HTML'
        <p>Paragraph1</p>
        <p>Paragraph2</p>
        <p>Paragraph3</p>
        <img src="https://example.com/image.jpg" alt="Image">
        <p>Paragraph4</p>
        <p>Paragraph5</p>
    HTML;

    $this->contentOnlyParagraphs = <<<'HTML'
        <p>Paragraph1</p>
        <p>Paragraph2</p>
        <p>Paragraph3</p>
        <p>Paragraph4</p>
        <p>Paragraph5</p>
        <p>Paragraph6</p>
        <p>Paragraph7</p>
        <p>Paragraph8</p>
        <p>Paragraph9</p>
        <p>Paragraph10</p>
        <p>Paragraph11</p>
        <p>Paragraph12</p>
        <p>Paragraph13</p>
        <p>Paragraph14</p>
        <p>Paragraph15</p>
        <p>Paragraph16</p>
        <p>Paragraph17</p>
        <p>Paragraph18</p>
        <p>Paragraph19</p>
        <p>Paragraph20</p>
    HTML;

});

it('can append first and second advertising only paragraphs', function () {
    $content = (new AdsPostParser($this->contentOnlyParagraphs))->appendAdvertising();

    expect($content)
        ->toContain("<p>Paragraph1</p><div>--- YOUR AD1 HERE ---</div>")
        ->toContain("<p>Paragraph4</p><div>--- YOUR AD2 HERE ---</div>");
});

it('can append first and second advertising', function () {
    $content = (new AdsPostParser($this->content))->appendAdvertising();

    expect($content)
        ->toContain("<p>Paragraph1</p>\n<div>--- YOUR AD1 HERE ---</div>")
        ->toContain("<p>Paragraph7</p>\n<div>--- YOUR AD2 HERE ---</div>");
});

it('can append advertising in small content with specific position', function () {
    $content = (new AdsPostParser($this->smallContent))->appendAdvertising();

    expect($content)
        ->toContain("<p>Paragraph1</p>\n<div>--- YOUR AD1 HERE ---</div>")
        ->toContain("<p>Paragraph4</p>\n<div>--- YOUR AD2 HERE ---</div>");
});

it('can append advertising', function () {
    $content = (new AdsPostParser($this->content))->appendAdvertising();

    expect($content)
        ->toContain('YOUR AD1 HERE')
        ->toContain('YOUR AD2 HERE')
        ->toContain('YOUR AD3 HERE')
        ->toContain('YOUR AD4 HERE');
});

it('can append advertising in small content', function () {
    $content = (new AdsPostParser($this->smallContent))->appendAdvertising();

    expect($content)
        ->toContain('YOUR AD1 HERE')
        ->toContain('YOUR AD2 HERE');
});

it('can append advertising only paragraphs', function () {
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

it('can append single advertising with index greater than the number of paragraphs', function () {
    $content = (new AdsPostParser($this->content))
        ->appendSingleAdvertising(100, 1);
    expect($content)->not()->toContain('YOUR AD1 HERE');
});
