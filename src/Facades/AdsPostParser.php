<?php

namespace The3LabsTeam\AdsPostParser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \The3LabsTeam\AdsPostParser\AdsPostParser
 */
class AdsPostParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \The3LabsTeam\AdsPostParser\AdsPostParser::class;
    }
}
