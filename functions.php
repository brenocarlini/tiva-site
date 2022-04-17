<?php

// FORMATAÇÃO MENU
// require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-pagination.php.php';

function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}






// REGISTRO DE MENU NO TEMA
register_nav_menus( array(
    'primary' => __( 'Menu Principal', 'locomotiva' ),
) );






// FORMULARIO DE CONTATO
require_once __DIR__ . '/inc/contact-comercial.php';




//ADD SUPORTE THUMBS
add_theme_support('post-thumbnails');
//ADD TAMANHOS DE THUMBS
add_image_size( 'post-home', 1200, 1200, true);
add_image_size( 'thumb-player', 512, 512, true);



// PERSONALIZACAO EXCERPT
function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 140);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    // $excerpt = $excerpt.'... <a href="'.get_the_permalink().'">[+]</a>';
    return $excerpt;
}



// REMOVER BARRA ADMIN
function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');



//ADD FOLHAS DE ESTILOS
function add_styles() {
    wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
    // wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css');
}
add_action( 'wp_enqueue_scripts', 'add_styles' );



//ADD JQUERY
function register_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'register_jquery');



//ADD JAVASCRIPTS
function add_scripts() {
    wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-1.2.1.min.js', true);
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', true);
    // wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', true);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', true);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', true);
    wp_enqueue_script( 'site', get_template_directory_uri() . '/assets/js/app.js', true);

}
add_action( 'wp_footer', 'add_scripts' );



// REMOVE WP HEAD
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_style' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');



// SUPORTE A WIDGET
function add_widget_Support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'add_Widget_Support' );



// CUSTOM POST TYPE - JOGOS
// require_once get_template_directory() . '/inc/cpt-jogos.php';



// CUSTOM POST TYPE - PRESIDENTES
require_once get_template_directory() . '/inc/cpt-presidentes.php';



// CUSTOM POST TYPE - CRONICAS
require_once get_template_directory() . '/inc/cpt-cronicas.php';



// CUSTOM POST TYPE - ELENCO
require_once get_template_directory() . '/inc/cpt-elenco.php';



// CUSTOM POST TYPE - COMISSÃO TECNICA
require_once get_template_directory() . '/inc/cpt-comissao.php';



// CUSTOM POST TYPE - PROFISSIONAIS
require_once get_template_directory() . '/inc/cpt-diretores.php';



// CUSTOM POST TYPE - CRAQUES
require_once get_template_directory() . '/inc/cpt-craques.php';



// CUSTOM POST TYPE - CURIOSIDADES
require_once get_template_directory() . '/inc/cpt-curiosidades.php';



// METABOX - POSTS
//require_once get_template_directory() . '/inc/mb-posts.php';



// TITULOS NOS CUSTOM POST TYPE
add_filter('enter_title_here', 'titles_custom' , 20 , 2 );
function titles_custom($title , $post){

    if( $post->post_type == 'presidentes' ){
        $my_title = "Escreva o nome completo";
        return $my_title;
    }

    if( $post->post_type == 'diretoria' ){
        $my_title = "Escreva o apelido ou nome abreviado";
        return $my_title;
    }
    if( $post->post_type == 'comissao' ){
        $my_title = "Escreva o apelido ou nome abreviado";
        return $my_title;
    }

    if( $post->post_type == 'elenco' ){
        $my_title = "Escreva o apelido ou nome abreviado";
        return $my_title;
    }
    
    if( $post->post_type == 'craques' ){
        $my_title = "Escreva o apelido ou nome abreviado";
        return $my_title;
    }

    return $title;

}




// LIMITAR TITULO
function title_limite($maximo) {

    $title = get_the_title();

    if ( strlen($title) > $maximo ) {
        $continua = "...";
    } else {
        $continua = "";
    } 

    $title = mb_substr( $title, 0, $maximo, 'UTF-8' );

    echo $title.$continua;
}




// WP_MAIL SUPORTE HTML
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );



// LIMPAR STYLE GALLERY
add_filter ('use_default_gallery_style', '__return_false');

