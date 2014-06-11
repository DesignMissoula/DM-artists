<?php

/*
Plugin Name: Missoula Artists
Plugin URI: http://www.missoulamadefair.com/
Description: Used by Millions to make WordPress better.
Author: Bradford Knowlton
Version: 1.6
Author URI: http://bradknowlton.com/
*/

DEFINE('ARTIST_SLUG', 'summer_2014_');

add_action( 'init', 'register_cpt_missoula_artist' );

function register_cpt_missoula_artist() {

    $labels = array( 
        'name' => _x( 'Artists', 'artist' ),
        'singular_name' => _x( 'Artist', 'artist' ),
        'add_new' => _x( 'Add New', 'artist' ),
        'add_new_item' => _x( 'Add New Artist', 'artist' ),
        'edit_item' => _x( 'Edit Artist', 'artist' ),
        'new_item' => _x( 'New Artist', 'artist' ),
        'view_item' => _x( 'View Artist', 'artist' ),
        'search_items' => _x( 'Search Artists', 'artist' ),
        'not_found' => _x( 'No artists found', 'artist' ),
        'not_found_in_trash' => _x( 'No artists found in Trash', 'artist' ),
        'parent_item_colon' => _x( 'Parent Artist:', 'artist' ),
        'menu_name' => _x( 'Artists', 'artist' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'medium' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'artists'),
        'capability_type' => 'post'
    );

    register_post_type( ARTIST_SLUG.'artist', $args );
}

add_action( 'init', 'register_taxonomy_missoula_medium' );

function register_taxonomy_missoula_medium() {

    $labels = array( 
        'name' => _x( 'Medium', 'medium' ),
        'singular_name' => _x( 'Medium', 'medium' ),
        'search_items' => _x( 'Search Medium', 'medium' ),
        'popular_items' => _x( 'Popular Medium', 'medium' ),
        'all_items' => _x( 'All Medium', 'medium' ),
        'parent_item' => _x( 'Parent Medium', 'medium' ),
        'parent_item_colon' => _x( 'Parent Medium:', 'medium' ),
        'edit_item' => _x( 'Edit Medium', 'medium' ),
        'update_item' => _x( 'Update Medium', 'medium' ),
        'add_new_item' => _x( 'Add New Medium', 'medium' ),
        'new_item_name' => _x( 'New Medium', 'medium' ),
        'separate_items_with_commas' => _x( 'Separate medium with commas', 'medium' ),
        'add_or_remove_items' => _x( 'Add or remove medium', 'medium' ),
        'choose_from_most_used' => _x( 'Choose from the most used medium', 'medium' ),
        'menu_name' => _x( 'Medium', 'medium' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( ARTIST_SLUG.'medium', array( ARTIST_SLUG.'artist'), $args );
}