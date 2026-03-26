# Changelog

All notable changes to `laravel-ads-post-parser` will be documented in this file.

## v5.1.0 - 2026-03-26

What changed

- upgraded the package test stack to PHP 8.4 with Laravel 12, Testbench 10, Pest 4, PHPUnit 12 and Larastan 3
- aligned the parser tests with the current prepend behaviour and stabilized CI on pull requests
- started tracking composer.lock so GitHub Actions can install dependencies deterministically
- refreshed the GitHub Actions workflow dependencies already pending in the backlog

Upgrade notes

- no package config changes are required
- no runtime API changes are expected for consumers
- this release mainly hardens maintenance, CI reliability and verified PHP 8.4 support

## v5.0.4 - 2026-02-09

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v5.0.3...v5.0.4

## v5.0.3 - 2026-01-26

### What's Changed

* Fix for tiny preview by @Claudio-Emmolo in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/35

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v5.0.2...v5.0.3

## v5.0.2 - 2026-01-21

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v5.0.1...v5.0.2

## v5.0.1 - 2026-01-20

### What's Changed

* Bump dependabot/fetch-metadata from 2.4.0 to 2.5.0 by @dependabot[bot] in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/34

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v5.0.0...v5.0.1

## v5.0.0 - 2025-11-28

### What's Changed

* Fix ad rendering logic to prepend ads to current element's outertext by @Claudio-Emmolo in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/33

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v4.0.2...v5.0.0

## v4.0.2 - 2025-11-17

### What's Changed

* Bump stefanzweifel/git-auto-commit-action from 5 to 6 by @dependabot[bot] in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/27
* Bump aglipanci/laravel-pint-action from 2.5 to 2.6 by @dependabot[bot] in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/28
* Refactor appendAdvertising methods to accept parameters for ad rendering by @Claudio-Emmolo in https://github.com/The-3Labs-Team/laravel-ads-post-parser/pull/31

**Full Changelog**: https://github.com/The-3Labs-Team/laravel-ads-post-parser/compare/v4.0.1...v4.0.2
