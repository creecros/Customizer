# CSS Generator

Write CSS programatically using PHP.

## Install

```php
composer require luizbills/css-generator
```

## Usage

```php
use luizbills\CSS_Generator\Generator as CSS_Generator;

$options = [
    // default values
    // 'indentation' => '    ', // 4 spaces
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
```

output:
```css
.color-white {
    color: #fff;
}
@media screen and (min-width: 30em) {
    html,
    body {
        background-color: black;
        color: white;
    }
}
@supports (display: grid) {
    .grid {
        display: grid;
    }
    @media screen and (max-width: 30em) {
        .grid-sm {
            display: grid;
        }
    }
}
```

Changing `$minify` to `true` will outputs:
```css
.color-white{color:#fff}@media screen and (min-width:30em){body,html{background-color:#000;color:#fff}}@supports (display:grid){.grid{display:grid}@media screen and (max-width:30em){.grid-sm{display:grid}}}
```

There is also a method `add_raw` that adds any string to your css. Useful to comments or include a framework.
```php
$css = new CSS_Generator();

$css->add_rule( '.color-white', [ 'color' => '#fff' ] );
$css->add_raw('/* my comment */ a { text-decoration: none }');

echo $css->get_output();
```

output:
```css
.color-white{
	color:#fff;
}
/* my comment */ a { text-decoration: none }
```

## License
MIT License &copy; 2018 Luiz Bills
