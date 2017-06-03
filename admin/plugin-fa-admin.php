<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dwwp_remove_dashboard_widget()
{
//    remove_meta_box($id, $screen, $context)
    remove_meta_box('dashboard_primary', 'dashboard', 'post_container_1');
}
add_action('wp_dashboard_setup', 'dwwp_remove_dashboard_widget');

/*
 * agregar Google analytics al menu del administrador
 */
function dwwp_add_google_link()
{
    global $wp_admin_bar;
    //var_dump($wp_admin_bar);
    $add_menu_array = array(
            'id'    => 'google_analytic_id'
        ,   'title' => 'Google Analytics'
        ,   'href'  => 'http://google.com/analytics'
    );
    
    $wp_admin_bar->add_menu($add_menu_array);
}
add_action('wp_before_admin_bar_render', 'dwwp_add_google_link');

if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}

/**
 * ejemplo: Custom Post Types
 */
//function dwwp_register_post_type()
//{
//    $args = array('public' => true, 'label' => 'Lista de Trabajos');
//    register_post_type('job', $args);
//}
//add_action('init', 'dwwp_register_post_type');


function dwwp_register_post_type()
{
    $singular = 'Lista de Trabajo';
    $plural = 'Lista de Trabajos';
    
    $labels = array(
            'name'              => $plural
        ,   'singular_name'     => $singular
        ,   'add_name'          => 'Agredar Nuevo'
        ,   'add_new_item'      => 'Agregar Nuevo '.$singular
        ,   'edit'              => 'Editar'
        ,   'edit_item'         => 'Editar '.$singular
        ,   'view'              => 'Ver '.$singular
        ,   'view_item'         => 'Ver '.$singular
        ,   'search_term'       => 'Buscar '.$plural
        ,   'parent'            => 'Parent '.$singular
        ,   'not_found'         => 'No '.$plural.' Found'
        ,   'not_found_int_trash'=>'No '.$plural.'In Trash'
    );
    
    $args = array(
            'labels'                 => $labels
        ,   'public'                => true
        ,   'publicly_queryable'    => true
        ,   'exclude_from_search'   => false
        ,   'show_in_nav_menus'     => true
        ,   'show_ui'               => true
        ,   'show_in_menu'          => true
        ,   'show_in_admin_bar'     => true
        ,   'menu_position'         => 6
        ,   'menu_icon'             => 'dashicons-admin-site'
        ,   'can_export'            => true
        ,   'delete_with_user'      => false
        ,   'hierarchical'          => false
        ,   'has_archive'           => true
        ,   'query_var'             => true
        ,   'capability_type'       => 'page'
        ,   'map_meta_cap'          => true
        ,   'rewrite'               => array(
                'slug'          => 'jobs'
            ,   'with_front'    => true
            ,   'pages'         => true
            ,   'feeds'         => false
        )
        ,   'supports'              => array(
                'title'
            ,   'editor'
            ,   'author'
            ,   'custom-fields'
            ,   'thumbnail'
        )
    );
    register_post_type('job', $args);
}
add_action('init', 'dwwp_register_post_type');

function dwwp_register_taxonomy()
{
    $plural = 'Locations';
    $singular = 'Location';
    
    $labels = array(
            'name'              => $plural
        ,   'singular_name'     => $singular
        ,   'popular_items'     => 'Popular'.$plural
        ,   'all_items'         => 'All '.$plural
        ,   'parent_item'       => null
        ,   'parent_item'       => null
        ,   'update_item'       => 'Update '.$singular
        ,   'add_new_item'      => 'Add New'.$singular
        ,   'add_name'          => 'Agredar Nuevo'
        ,   'add_new_item'      => 'Agregar Nuevo '.$singular
        ,   'edit'              => 'Editar'
        ,   'edit_item'         => 'Editar '.$singular
        ,   'view'              => 'Ver '.$singular
        ,   'view_item'         => 'Ver '.$singular
        ,   'search_term'       => 'Buscar '.$plural
        ,   'parent'            => 'Parent '.$singular
        ,   'not_found'         => 'No '.$plural.' Found'
        ,   'not_found_int_trash'=>'No '.$plural.'In Trash'
        ,   'menu_name'         => $plural
    );
    
    $args = array(
            'hierarchical'          => true
        ,   'labels'                => $labels
        ,   'show_ui'               => true
        ,   'show_admin_column'     => true
        ,   'update_count_callback' => '_update_post_term_count'
        ,   'query_var'             => true
        ,   'rewrite'               => array(
                'slug'  => 'location'
            )
    );
    
    register_taxonomy('location', 'job', $args);
}
add_action('init', 'dwwp_register_taxonomy');