<?php

// config for The3LabsTeam/AdsPostParser

return [
    /**
     * Thresholds to add advertising
     * The first index is the index of the advertising
     * The second index is the threshold to add the advertising
     * Example:
     * 1 => 0 -> add the first advertising after the first paragraph
     * 2 => 3 -> add the second advertising after the fourth paragraph
     */
    'thresholds' => [
        1 => 0,
        2 => 3,
        3 => 9,
        4 => 12,
        5 => 15,
    ],
    /**
     * Blacklist to avoid adding advertising in some elements
     * The blacklist is a regex
     * Example:
     * '/<img|<quote|<h1|<h2|<h3|<h4|<h5/'
     */
    'blacklist' => [
        'before' => '/<iframe|<img|<h2|<h3|<ul|<li|<div/',
        'after' => '/<iframe|<img|<ul|<li|<table|<div/',
    ]
];
