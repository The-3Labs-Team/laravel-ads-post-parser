<?php

use Illuminate\Support\Facades\Route;
use The3LabsTeam\AdsPostParser\Controllers\AdsPostParserController;

Route::prefix('ads-post-parser')
    ->group(function () {
        Route::post('/get-preview-html', [AdsPostParserController::class, 'getPreviewHtml']);
    });
