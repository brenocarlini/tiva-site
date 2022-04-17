<?php
// CUSTOM POST TYPES OUTROS CURIOSIDADES

function post_curiosidades() {
	$labels = array(
		'name'                => __( 'Curiosidades' ),
		'singular_name'       => __( 'Curiosidade'),
		'menu_name'           => __( 'Curiosidades'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todas Curiosidades'),
		'view_item'           => __( 'Ver Curiosidade'),
		'add_new_item'        => __( 'Adicionar Curiosidade'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Curiosidade'),
		'update_item'         => __( 'Atualizar Curiosidade'),
		'search_items'        => __( 'Buscar Curiosidade'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'curiosidades',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'curiosidades'),
		'description'         => __( 'Cadastre uma curiosidade'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'order',),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	    'yarpp_support'       => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'menu_icon'           => 'dashicons-buddicons-tracking',
        'menu_position'       => 9,
        'rewrite'             => $rewrite,

        'capabilities' => array(
			'edit_post'          => 'update_core',
			'read_post'          => 'update_core',
			'delete_post'        => 'update_core',
			'edit_posts'         => 'update_core',
			'edit_others_posts'  => 'update_core',
			'delete_posts'       => 'update_core',
			'publish_posts'      => 'update_core',
			'read_private_posts' => 'update_core'
		),
    );
    register_post_type( 'curiosidades', $args );
}
add_action( 'init', 'post_curiosidades', 2 );







