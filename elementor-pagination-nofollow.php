<?php
/*
Plugin Name: Elementor Pagination Nofollow
Description: Adds rel="nofollow" to Elementor pagination links
Version: 1.0
Author: David Dikman
*/

function add_nofollow_to_elementor_pagination($html) {
    // Use a regular expression to find and modify pagination links
    $pattern = '/<a\s[^>]*class=["\']page-numbers["\'][^>]*>/i';
    return preg_replace_callback($pattern, function($matches) {
        $link = $matches[0];
        if (strpos($link, 'rel=') === false) {
            $link = str_replace('>', ' rel="nofollow">', $link);
        } else {
            $link = preg_replace('/rel=(["\'])(.*?)(["\'])/', 'rel="nofollow $2"', $link);
        }
        return $link;
    }, $html);
}

add_filter('elementor/widget/render_content', 'add_nofollow_to_elementor_pagination', 10, 2);