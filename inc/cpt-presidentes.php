<?php
// CUSTOM POST TYPES OUTROS PRESIDENTES

function post_presidentes() {
	$labels = array(
		'name'                => __( 'Presidentes' ),
		'singular_name'       => __( 'Presidente'),
		'menu_name'           => __( 'Presidentes'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todos Presidentes'),
		'view_item'           => __( 'Ver Presidente'),
		'add_new_item'        => __( 'Adicionar Presidente'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Presidente'),
		'update_item'         => __( 'Atualizar Presidente'),
		'search_items'        => __( 'Buscar Presidente'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'presidentes',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'presidentes'),
		'description'         => __( 'Cadastre seu presidente'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'order',),
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
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'menu_position'       => 5,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'presidentes_meta_box', 

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
    register_post_type( 'presidentes', $args );
}
add_action( 'init', 'post_presidentes', 2 );


function presidentes_meta_box(){    
    add_meta_box('presidentes_info', __('Período'), 'presidentes_meta_info', 'presidentes', 'normal', 'high');
}


function presidentes_meta_info(){
    global $post;

    echo '<table width="100%">';

    

    echo '<tr>';

    echo '<td>';
    $presidentes_periodo_inicio = get_post_meta($post->ID, 'presidentes_periodo_inicio', true);  
    echo '<label for="presidentes_periodo_inicio">Início: </label> <br /> <br />';
    echo '<input type="number" min="1963" step="1" name="presidentes_periodo_inicio" id="presidentes_periodo_inicio" value="'.  $presidentes_periodo_inicio .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '<td>';
    $presidentes_periodo_fim = get_post_meta($post->ID, 'presidentes_periodo_fim', true);  
    echo '<label for="presidentes_periodo_fim">Fim: </label> <br /> <br />';
    echo '<input type="number" min="1963" step="1" name="presidentes_periodo_fim" id="presidentes_periodo_fim" value="'.  $presidentes_periodo_fim .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';



    echo '</table>';


}




function save_presidentes_post(){
    global $post;

	$id = $post->ID ?? "";
	$presidentes_periodo_inicio = $_POST['presidentes_periodo_inicio'] ?? "";
	$presidentes_periodo_fim = $_POST['presidentes_periodo_fim'] ?? "";
	
    update_post_meta($id, 'presidentes_periodo_inicio', $presidentes_periodo_inicio);
    update_post_meta($id, 'presidentes_periodo_fim', $presidentes_periodo_fim);
}

add_action('save_post', 'save_presidentes_post');






