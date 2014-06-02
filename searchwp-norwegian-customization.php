<?php

/**
* Copyright (c) 2014 Tom Erik Støwer (http://github.com/testower)
*
* All rights reserved.
*
* This script is free software.
*
* Dependencies:
* - norwegian-stop-words.txt is from https://code.google.com/p/stop-words/
* - vendor/NorwegianStemmer.php: http://github.com/lillylabs/php-norwegian-stemmer
*/

/*
    Plugin Name: SearchWP Norwegian Customization
    Plugin URI: http://github.com/lillylabs/SearchWP-norwegian-customization
    Description: Norwegian customizations for SearchWP
    Version: 0.0.1
    Author: Tom Erik Støwer
    Author URI: http://github.com/testower
    License: MIT
*/

require_once 'vendor/NorwegianStemmer.php';

function my_searchwp_custom_stemmer( $unstemmed ) {
    $stemmer = new NorwegianStemmer();
    $stemmed = $stemmer->Stem( $unstemmed );
    return $stemmed;
}

add_filter( 'searchwp_custom_stemmer', 'my_searchwp_custom_stemmer' );

function my_searchwp_common_words( $terms ) {
    $file = plugin_dir_path( __FILE__ ) . 'norwegian-stop-words.txt';
    $terms = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return $terms;
}

add_filter( 'searchwp_common_words', 'my_searchwp_common_words' );

?>
