<?php

namespace The3LabsTeam\AdsPostParser;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use The3LabsTeam\AdsPostParser\Commands\AdsPostParserCommand;

class AdsPostParserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ads-post-parser')
            ->hasConfigFile()
            ->hasViews()

            ->hasMigration('create_laravel-ads-post-parser_table')
            ->hasCommand(AdsPostParserCommand::class);
    }
}
