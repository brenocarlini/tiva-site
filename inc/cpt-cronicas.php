<?php
// CUSTOM POST TYPES OUTROS CRÔNICAS

function post_cronicas() {
	$labels = array(
		'name'                => __( 'Cronicas' ),
		'singular_name'       => __( 'Cronica'),
		'menu_name'           => __( 'Cronicas'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todas Cronicas'),
		'view_item'           => __( 'Ver Cronica'),
		'add_new_item'        => __( 'Adicionar Cronica'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Cronica'),
		'update_item'         => __( 'Atualizar Cronica'),
		'search_items'        => __( 'Buscar Cronica'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'cronicas',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'cronicas'),
		'description'         => __( 'Cadastre sua Cronica'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail',),
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
        'menu_icon'           => 'dashicons-format-quote',
        'menu_position'       => 6,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'cronicas_meta_box', 

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
    register_post_type( 'cronicas', $args );
}
add_action( 'init', 'post_cronicas', 2 );


function cronicas_meta_box(){    
    add_meta_box('cronicas_info', __('Informações de Autoria'), 'cronicas_meta_info', 'cronicas', 'normal', 'high');
}


function cronicas_meta_info(){
    global $post;

    echo '<table width="100%">';

    

    echo '<tr>';

    echo '<td>';
    $cronicas_autor = get_post_meta($post->ID, 'cronicas_autor', true);  
    echo '<label for="cronicas_autor">Autor: </label> <br /> <br />';
    echo '<input type="text" name="cronicas_autor" id="cronicas_autor" value="'.$cronicas_autor.'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';



    echo '<tr>';

    echo '<td>';
    $cronicas_descricao = get_post_meta($post->ID, 'cronicas_descricao', true);  
    echo '<label for="cronicas_descricao">Descrição: </label> <br /> <br />';
    echo '<input type="text" name="cronicas_descricao" id="cronicas_descricao" value="'.$cronicas_descricao.'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';



    echo '</table>';


}




function save_cronicas_post(){
    global $post;

	$id = $post->ID ?? "";
	$cronicas_autor = $_POST['cronicas_autor'] ?? "";
	$cronicas_descricao = $_POST['cronicas_descricao'] ?? "";
	
    update_post_meta($id, 'cronicas_autor', $cronicas_autor);
    update_post_meta($id, 'cronicas_descricao', $cronicas_descricao);
}

add_action('save_post', 'save_cronicas_post');






