<?php 
/*Habilitar miniaturas en post*/
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// Función para contar visualizaciones de un post.
function set_post_views() {
    if ( is_single() ) {
        $post_ID = get_the_ID();
        $count = get_post_meta( $post_ID, 'post_views', true );

        if ( $count == '' ) {
            delete_post_meta( $post_ID, 'post_views' );
            add_post_meta( $post_ID, 'post_views', 1 );
        } else {
            update_post_meta( $post_ID, 'post_views', ++$count );
        }
    }
}
add_action( 'wp', 'set_post_views' );

// Función para obtener el número de visualizaciones de un post
function get_post_views( $post_ID ){
    $count = get_post_meta($post_ID, 'post_views', true);

    if ( $count == '' ){
        delete_post_meta($post_ID, 'post_views');
        add_post_meta($post_ID, 'post_views', 0);
        return 0;
    }

    return $count;
}
?>