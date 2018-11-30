<?php

require_once __DIR__ . '/../vendor/autoload.php';

use luizbills\CSS_Generator\Generator as CSS_Generator;

$options = [
    'indentation' => '  ', // 2 spaces
];
$css = new CSS_Generator( $options );

// single selector
$css->add_rule( '.color-white', [ 'color' => '#fff' ] );

$css->open_block( 'media', 'screen and (min-width: 30em)' );

// multiple selectors
$css->add_rule( [ 'html', 'body' ], [
    'background-color' => 'black',
    'color' => 'white'
] );

$css->close_block(); // close a block

$css->open_block( 'supports', '(display: grid)' );

$css->add_rule( '.grid', [
    'display' => 'grid',
] );

// nested block
$css->open_block( 'media', 'screen and (max-width: 30em)' );

$css->add_rule( '.grid-sm', [
    'display' => 'grid',
] );

$css->close_blocks(); // close all blocks

$minify = false;
echo $css->get_output( $minify );