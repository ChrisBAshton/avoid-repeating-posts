<?php
/**
 * Plugin Name: Avoid Repeating Posts
 * Description: Avoid showing same WordPress post in multiple loops. Fresh content in every loop.
 * Version: 1.0.0
 * Author: ChrisBAshton
 * Author URI: https://twitter.com/ChrisBAshton
 */

 add_filter('the_title', 'track_displayed_posts');
 add_action('pre_get_posts','remove_already_displayed_posts');

 $displayed_posts = [];

 function track_displayed_posts($title) {
     global $displayed_posts;
     $displayed_posts[] = get_the_ID();
     return $title; // don't mess with the title
 }

 function remove_already_displayed_posts($query) {
    global $displayed_posts;
    $query->set('post__not_in', $displayed_posts);
 }
