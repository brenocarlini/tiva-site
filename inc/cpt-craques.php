<?php
// CUSTOM POST TYPES OUTROS CRAQUES

function post_craques() {
	$labels = array(
		'name'                => __( 'Craques' ),
		'singular_name'       => __( 'Craque'),
		'menu_name'           => __( 'Craques'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todos Craques'),
		'view_item'           => __( 'Ver Craque'),
		'add_new_item'        => __( 'Adicionar Craque'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Craque'),
		'update_item'         => __( 'Atualizar Craque'),
		'search_items'        => __( 'Buscar Craque'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'craques',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'craques'),
		'description'         => __( 'Cadastre seu craque'),
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
        'menu_icon'           => 'dashicons-id',
        'menu_position'       => 9,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'craques_meta_box', 

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
    register_post_type( 'craques', $args );
}
add_action( 'init', 'post_craques', 2 );


function craques_meta_box(){    
    add_meta_box('craques_info', __('Informações'), 'craques_meta_info', 'craques', 'normal', 'high');
}


function craques_meta_info(){
    global $post;

    echo '<table width="100%">';

    

    echo '<tr>';

    echo '<td>';
    $craques_nome = get_post_meta($post->ID, 'craques_nome', true);  
    echo '<label for="craques_nome">Nome Completo: </label> <br /> <br />';
    echo '<input type="text" name="craques_nome" id="craques_nome" value="'.  $craques_nome .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';



    echo '<tr>';

    echo '<td>';
    $craques_descricao = get_post_meta($post->ID, 'craques_descricao', true);  
    echo '<label for="craques_descricao">Descrição: </label> <br /> <br />';
    echo '<textarea name="craques_descricao" id="craques_descricao" style="width:100%; margin-bottom:15px;" />'.  $craques_descricao .'</textarea>';
    echo '</td>';

    echo '</tr>';



    echo '</table>';


}




function save_craques_post(){
    global $post;

	$id = $post->ID ?? "";
	$craques_nome = $_POST['craques_nome'] ?? "";
	$craques_descricao = $_POST['craques_descricao'] ?? "";
	
    update_post_meta($id, 'craques_nome', $craques_nome);
    update_post_meta($id, 'craques_descricao', $craques_descricao);
}

add_action('save_post', 'save_craques_post');






