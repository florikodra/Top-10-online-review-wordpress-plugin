<?php

add_shortcode( 'test', 'test_callback' );

function test_callback( $atts )
{
    return "<h1>".$atts["name"].$atts["surname"]."</h1>";
}
