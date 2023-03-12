<?php

// config for The3LabsTeam/AdsPostParser
return [
    'tresholds' => [
        // number of paragraphs => number of ads
        2 => 1,
        10 => 2,
        18 => 3,
        24 => 4,
    ],
    'blacklist' => '/\[shortcode|\[image|\[product|\[widget|\[twitter|\[facebook]|\[youtube|\[gallery|\[media|<img|<quote|<h1|<h2|<h3|<h4|<h5/',
];
