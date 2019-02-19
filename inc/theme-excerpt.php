<?php
/**
 * Quba Excerpt
 *
 * @package quba
 */
function themezila_excerpt($length)
{
    return '&hellip; <p class="read-more"><a href="' . get_the_permalink() . '"> Continue Reading</a></p>';
}
add_filter('excerpt_more', 'themezila_excerpt', 999);

function my_excerpt_length($length)
{
    return 80;
}
add_filter('excerpt_length', 'my_excerpt_length');
