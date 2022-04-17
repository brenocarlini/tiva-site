<?php
// CUSTOM POST TYPES DIRETORES



function post_diretoria() {
	$labels = array(
		'name'                => __( 'Diretores' ),
		'singular_name'       => __( 'Diretor'),
		'menu_name'           => __( 'Diretoria'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todos Diretores'),
		'view_item'           => __( 'Ver Diretor'),
		'add_new_item'        => __( 'Adicionar Diretor'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Diretor'),
		'update_item'         => __( 'Atualizar Diretor'),
		'search_items'        => __( 'Buscar Diretor'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'diretoria',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'diretoria'),
		'description'         => __( 'Cadastre seu diretor'),
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
        'menu_icon'           => 'dashicons-businessman',
        'menu_position'       => 7,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'diretoria_meta_box',  

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
    register_post_type( 'diretoria', $args );
}
add_action( 'init', 'post_diretoria', 2 );


function diretoria_meta_box(){        
    add_meta_box('diretoria_function', __('Função'), 'diretoria_meta_function', 'diretoria', 'normal', 'high');
}


function diretoria_meta_function(){
    global $post;
    $diretoria_funcao = get_post_meta($post->ID, 'diretoria_funcao', true) ?? ""; 

    echo '<select name="diretoria_funcao">';

        echo '<option value="dir_presidente" '. selected( $diretoria_funcao, 'dir_presidente' ).'>Presidente</option>';
        echo '<option value="dir_vp" '. selected( $diretoria_funcao, 'dir_vp' ).'>1º Vice Presidente</option>';
        echo '<option value="dir_vp_futebol" '. selected( $diretoria_funcao, 'dir_vp_futebol' ).'>Vice Presidente de Futebol</option>';
        echo '<option value="dir_vp_financas" '. selected( $diretoria_funcao, 'dir_vp_financas' ).'>Vice Presidente de Finanças</option>';
        echo '<option value="dir_vp_administrativo" '. selected( $diretoria_funcao, 'dir_vp_administrativo' ).'>Vice Presidente Administrativo</option>';
        echo '<option value="dir_vp_comercial" '. selected( $diretoria_funcao, 'dir_vp_comercial' ).'>Vice Presidente Comercial</option>';
        echo '<option value="dir_vp_patrimonio" '. selected( $diretoria_funcao, 'dir_vp_patrimonio' ).'>Vice Presidente de Patrimônio</option>';
        echo '<option value="dir_vp_social" '. selected( $diretoria_funcao, 'dir_vp_social' ).'>Vice Presidente Social e Esportivo</option>';
        echo '<option value="del_presidente" '. selected( $diretoria_funcao, 'del_presidente' ).'>Deliberativo - Presidente</option>';
        echo '<option value="del_vp" '. selected( $diretoria_funcao, 'del_vp' ).'>Deliberativo - Vice Presidente</option>';
        echo '<option value="fis_presidente" '. selected( $diretoria_funcao, 'fis_presidente' ).'>Fiscal - Presidente</option>';
        
    echo '</select>';
}

function diretoria_meta_order(){
    global $post;
    $diretoria_ordem = get_post_meta($post->ID, 'diretoria_ordem', true) ?? "";  
    echo '<input type="number" name="diretoria_ordem" id="diretoria_ordem" value="'.  $diretoria_ordem .'" style="margin-bottom:25px;" readonly />';
}

function save_diretoria_post(){
    global $post;  
	
	$id = $post->ID ?? "";
	$diretoria_funcao = $_POST['diretoria_funcao'] ?? "";
    $diretoria_ordem = "";

    if($diretoria_funcao == 'dir_presidente') {
        $diretoria_ordem = 100;
    }   
    if($diretoria_funcao == 'dir_vp') {
        $diretoria_ordem = 101;
    }   
    if($diretoria_funcao == 'dir_vp_futebol') {
        $diretoria_ordem = 102;
    }   
    if($diretoria_funcao == 'dir_vp_financas') {
        $diretoria_ordem = 103;
    }   
    if($diretoria_funcao == 'dir_vp_administrativo') {
        $diretoria_ordem = 104;
    }   
    if($diretoria_funcao == 'dir_vp_comercial') {
        $diretoria_ordem = 105;
    }   
    if($diretoria_funcao == 'dir_vp_patrimonio') {
        $diretoria_ordem = 106;
    }   
    if($diretoria_funcao == 'dir_vp_social') {
        $diretoria_ordem = 107;
    }  

    if($diretoria_funcao == 'del_presidente') {
        $diretoria_ordem = 200;
    } 
    if($diretoria_funcao == 'del_vp') {
        $diretoria_ordem = 201;
    }  

    if($diretoria_funcao == 'fis_presidente') {
        $diretoria_ordem = 300;
    } 
	
    update_post_meta($id, 'diretoria_funcao', $diretoria_funcao);
    update_post_meta($id, 'diretoria_ordem', $diretoria_ordem);
}

add_action('save_post', 'save_diretoria_post');




function diretoria_funcao($id) {
    $diretoria_funcao = get_post_meta( $id, 'diretoria_funcao', true );

    if($diretoria_funcao == 'dir_presidente') {
        $diretoria_funcao = 'Presidente';
    }
    if($diretoria_funcao == 'dir_vp') {
        $diretoria_funcao = '1º Vice Presidente';
    }
    if($diretoria_funcao == 'dir_vp_futebol') {
        $diretoria_funcao = 'Vice Presidente de Futebol';
    }
    if($diretoria_funcao == 'dir_vp_financas') {
        $diretoria_funcao = 'Vice Presidente de Finanças';
    }
    if($diretoria_funcao == 'dir_vp_administrativo') {
        $diretoria_funcao = 'Vice Presidente Administrativo';
    }
    if($diretoria_funcao == 'dir_vp_comercial') {
        $diretoria_funcao = 'Vice Presidente Comercial';
    }
    if($diretoria_funcao == 'dir_vp_patrimonio') {
        $diretoria_funcao = 'Vice Presidente de Patrimônio';
    }
    if($diretoria_funcao == 'dir_vp_social') {
        $diretoria_funcao = 'Vice Presidente Social e Esportivo';
    }
    if($diretoria_funcao == 'del_presidente') {
        $diretoria_funcao = 'Presidente';
    }
    if($diretoria_funcao == 'del_vp') {
        $diretoria_funcao = 'Vice Presidente';
    }
    if($diretoria_funcao == 'fis_presidente') {
        $diretoria_funcao = 'Presidente';
    }

    return $diretoria_funcao;

}




//CRIANDO COLUNAS PERSONALIZADAS

add_filter( 'manage_edit-diretoria_columns', 'diretoria_manage_edit_columns' );
function diretoria_manage_edit_columns( $columns ) {
  $diretoria_columns = array(
    "cb" => $columns["cb"],
    "title" => 'Nome',
    "diretoria_funcao" => 'Função',
    
  );
  return $diretoria_columns;
}
add_action( "manage_posts_custom_column", 'diretoria_manage_columns', 10, 2);
function diretoria_manage_columns( $column ) {
  global $post;
  switch ($column) {
    case "diretoria_funcao":
      // echo get_post_meta( $post->ID, 'diretoria_funcao', true );
      echo diretoria_funcao($post->ID);
    break;
    case "diretoria_ordem":
      echo get_post_meta( $post->ID, 'diretoria_ordem', true );
    break;
  }
}


//LISTANDO COLUNAS PELA ORDEM
function diretoria_types_admin_order( $wp_query ) {
    if (is_admin()) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'diretoria') {
            $wp_query->set('meta_key','diretoria_ordem');
            $wp_query->set('orderby', 'meta_value_num');
            $wp_query->set('order', 'ASC');
        }
    }
}
add_filter('pre_get_posts', 'diretoria_types_admin_order');


