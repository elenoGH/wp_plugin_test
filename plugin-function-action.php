<?php

/* 
 * Plugin Name: funciones y acciones de prueba
 * Plugin URI:https://developer.wordpress.org/plugins/the-basics/
 * Description:Basic WordPress Plugin Header Comment, funciones y acciones basicas de WP
 * Version:1.0
 * Author:Eleno
 * Author URI:https://developer.wordpress.org/
 * License:GPL2
 * License URI:https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:wporg
 * Domain Path:/prueba_plugin
 * {Plugin Name} is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    {Plugin Name} is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with {Plugin Name}. If not, see {URI to Plugin License}.

 */

if ( is_admin() ) {
// we are in admin mode
    //hacemos un ejemplo al ejecutar activacion del plugin
    global $wpdb;
    $nombreTabla = $wpdb->prefix . "tabla_ejemplo";
    if ($wpdb->get_var("SHOW TABLES LIKE '$nombreTabla'") == $nombreTabla) {
        /**
         * Si la tabla existe...
         * No haremos nada, pero se puede comprobar lo que hay actualizarlo por 
         * si había una versión vieja, guardar una copia de lo que hay etc etc..
         */
    } else {
        $sql = "CREATE TABLE " . $nombreTabla . " (
        idFrase mediumint(9) NOT NULL AUTO_INCREMENT,
        categoria VARCHAR(20),
        frase TEXT NOT NULL,
        autor VARCHAR(50),
        PRIMARY KEY (idFrase)
        );";
        $wpdb->query($sql);
    }
//    add_option('Activated_Plugin','Plugin-Slug');
//    do_action( 'plugin_f_a_tets_eleno_activation' );
    require_once( dirname( __FILE__ ) . '/admin/plugin-fa-admin.php' );
} 
else {
//    $response = wp_remote_head( 'https://api.github.com/users/blobaugh' );
//    var_dump($response);
//    die;

//    $response = wp_remote_get( 'https://api.github.com/users/blobaugh' );
//    $body = wp_remote_retrieve_body( $response );
//    var_dump($body);
//    die;
//    require_once( dirname( __FILE__ ) . '/public/plugin-fa-public.php' );
}

//
//function plugin_f_a_tets_eleno_activation()
//{
//    if ( is_admin() ) {
//    // we are in admin mode
//        //hacemos un ejemplo al ejecutar activacion del plugin
//        global $wpdb;
//        $nombreTabla = $wpdb->prefix . "frases_ejemplo";
//        if ($wpdb->get_var("SHOW TABLES LIKE '$nombreTabla'") == $nombreTabla) {
//            /**
//             * Si la tabla existe...
//             * No haremos nada, pero se puede comprobar lo que hay actualizarlo por 
//             * si había una versión vieja, guardar una copia de lo que hay etc etc..
//             */
//        } else {
//            $sql = "CREATE TABLE " . $nombreTabla . " (
//            idFrase mediumint(9) NOT NULL AUTO_INCREMENT,
//            categoria VARCHAR(20),
//            frase TEXT NOT NULL,
//            autor VARCHAR(50),
//            PRIMARY KEY (idFrase)
//            );";
//            $wpdb->query($sql);
//        }
//        add_option('Activated_Plugin','Plugin-Slug');
//        do_action( 'plugin_f_a_tets_eleno_activation' );
//        require_once( dirname( __FILE__ ) . '/admin/plugin-fa-admin.php' );
//    } 
//    else {
//    //    $response = wp_remote_head( 'https://api.github.com/users/blobaugh' );
//    //    var_dump($response);
//    //    die;
//
//    //    $response = wp_remote_get( 'https://api.github.com/users/blobaugh' );
//    //    $body = wp_remote_retrieve_body( $response );
//    //    var_dump($body);
//    //    die;
//    //    require_once( dirname( __FILE__ ) . '/public/plugin-fa-public.php' );
//    }
//}
// 
//function plugin_f_a_tets_eleno_deactivation()
//{
//    
//    /**
//     * Solo desactivar
//     * algunas tareas para desactivar...
//     * Sin borrar Nada, hasta que Elimines por completo tu plugin
//     * our post type will be automatically removed, so no need to unregister it
//     */
//    
//    // clear the permalinks to remove our post type's rules
//    flush_rewrite_rules();
//}
//
///* Lo que quereamos hacer al desactivar el plugin
// * Por ejemplo borrar la bd, pero no es recomndable
// * pues si le das sin querer perderías todos los datos
// * ejemplo:
// * 
//    global $wpdb;
//    $nombreTabla = $wpdb->prefix . "mdua_frases";
//
//    $sql = "DROP TABLE $nombreTabla";
//    $wpdb->query($sql);
//*/
//
//
///**
// * Activacion de un hook
// * En la activación, los complementos pueden ejecutar una rutina para agregar 
// * reglas de reescritura, agregar tablas de base de datos personalizadas o 
// * establecer valores de opción predeterminados.
// */
//
//register_activation_hook( __FILE__, 'plugin_f_a_tets_eleno_activation' );
//
///**
// * Desactivar Hook
// * Al desactivar, los complementos pueden ejecutar una rutina para eliminar 
// * datos temporales, como caché y archivos temporales y directorios.
// */
//
//register_deactivation_hook( __FILE__, 'plugin_f_a_tets_eleno_deactivation' );


//function my_plugin_activate() {
//
//  add_option( 'Activated_Plugin', 'Plugin-Slug' );
//
//  /* activation code here */
//}
//register_activation_hook( __FILE__, 'my_plugin_activate' );
//
//function load_plugin() {
//
//    if ( is_admin() && get_option( 'Activated_Plugin' ) == 'Plugin-Slug' ) {
//
//        delete_option( 'Activated_Plugin' );
//
//        /* do stuff once right after activation */
//        // example: add_action( 'init', 'my_init_function' );
//        require_once( dirname( __FILE__ ) . '/admin/plugin-fa-admin.php' );
//    }
//}
//add_action( 'admin_init', 'load_plugin' );


//function pluginprefix_setup_post_type()
//{
//    // register the "book" custom post type
//    register_post_type( 'book', ['public' => 'true'] );
//    require_once( dirname( __FILE__ ) . '/admin/plugin-fa-admin.php' );
//}
//add_action( 'init', 'pluginprefix_setup_post_type' );
// 
//function pluginprefix_install()
//{
//    // trigger our function that registers the custom post type
//    pluginprefix_setup_post_type();
// 
//    // clear the permalinks after the post type has been registered
//    flush_rewrite_rules();
//}
//register_activation_hook( __FILE__, 'pluginprefix_install' );