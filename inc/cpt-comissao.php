<?php
// CUSTOM POST TYPES OUTROS PROFISSIONAIS

function post_comissao() {
	$labels = array(
		'name'                => __( 'Profissionais' ),
		'singular_name'       => __( 'Profissional'),
		'menu_name'           => __( 'Comissão Técnica'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todos Profissionais'),
		'view_item'           => __( 'Ver Profissional'),
		'add_new_item'        => __( 'Adicionar Profissional'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Profissional'),
		'update_item'         => __( 'Atualizar Profissional'),
		'search_items'        => __( 'Buscar Profissional'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'comissao',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'comissao'),
		'description'         => __( 'Cadastre seu profissional'),
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
        'menu_icon'           => 'dashicons-businessperson',
        'menu_position'       => 8,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'comissao_meta_box',

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
    register_post_type( 'comissao', $args );
}
add_action( 'init', 'post_comissao', 2 );


function comissao_meta_box(){        
    add_meta_box('comissao_function', __('Função'), 'comissao_meta_function', 'comissao', 'normal', 'high');
}


function comissao_meta_function(){
    global $post;
    $comissao_funcao = get_post_meta($post->ID, 'comissao_funcao', true) ?? ""; 

    echo '<select name="comissao_funcao">';

        echo '<option value="diretor_futebol" '. selected( $comissao_funcao, 'gerente' ).'>Diretor de Futebol</option>';
        echo '<option value="gerente_futebol" '. selected( $comissao_funcao, 'gerente' ).'>Gerente de Futebol</option>';
        echo '<option value="supervisor_futebol" '. selected( $comissao_funcao, 'supervisor' ).'>Supervisor de Futebol</option>';
        echo '<option value="tecnico" '. selected( $comissao_funcao, 'tecnico' ).'>Técnico</option>';
        echo '<option value="auxiliar_tecnico" '. selected( $comissao_funcao, 'auxiliar_tecnico' ).'>Auxliar Técnico</option>';
        echo '<option value="preparador_fisico" '. selected( $comissao_funcao, 'preparador_fisico' ).'>Preparador Físico</option>';
        echo '<option value="treinador_goleiro" '. selected( $comissao_funcao, 'treinador_goleiro' ).'>Treinador de Goleiro</option>';
        echo '<option value="fisioterapeuta" '. selected( $comissao_funcao, 'fisioterapeuta' ).'>Fisioterapeuta</option>';
        echo '<option value="nutricionista" '. selected( $comissao_funcao, 'nutricionista' ).'>Nutricionista</option>';
        echo '<option value="fisiologista" '. selected( $comissao_funcao, 'fisiologista' ).'>Fisiologista</option>';
        echo '<option value="analista_desempenho" '. selected( $comissao_funcao, 'analista_desempenho' ).'>Analista de Desempenho</option>';
        echo '<option value="massagista" '. selected( $comissao_funcao, 'massagista' ).'>Massagista</option>';
		echo '<option value="roupeiro" '. selected( $comissao_funcao, 'roupeiro' ).'>Roupeiro</option>';
        echo '<option value="auxiliar_rouparia" '. selected( $comissao_funcao, 'auxiliar_rouparia' ).'>Auxiliar de Rouparia</option>';
        
    echo '</select>';
}

function comissao_meta_order(){
    global $post;
    $comissao_ordem = get_post_meta($post->ID, 'comissao_ordem', true);  
    echo '<input type="number" name="comissao_ordem" id="comissao_ordem" value="'.  $comissao_ordem .'" style="margin-bottom:25px;" readonly />';
}

function save_comissao_post(){
    global $post;  
	
	$id = $post->ID ?? "";
	$comissao_funcao = $_POST['comissao_funcao'] ?? "";
    $comissao_ordem = "";
	

    if($comissao_funcao == 'diretor_futebol') {
        $comissao_ordem = -1;
    } 
    if($comissao_funcao == 'gerente_futebol') {
        $comissao_ordem = 0;
    }  
    if($comissao_funcao == 'supervisor_futebol') {
        $comissao_ordem = 1;
    }  
    if($comissao_funcao == 'tecnico') {
        $comissao_ordem = 2;
    }   
    if($comissao_funcao == 'auxiliar_tecnico') {
        $comissao_ordem = 3;
    }
	if($comissao_funcao == 'preparador_fisico') {
        $comissao_ordem = 4;
    }   
    if($comissao_funcao == 'treinador_goleiro') {
        $comissao_ordem = 5;
    }   
    if($comissao_funcao == 'fisioterapeuta') {
        $comissao_ordem = 6;
    }
    if($comissao_funcao == 'nutricionista') {
        $comissao_ordem = 7;
    } 
    if($comissao_funcao == 'fisiologista') {
        $comissao_ordem = 8;
    } 
    if($comissao_funcao == 'analista_desempenho') {
        $comissao_ordem = 9;
    }   
    if($comissao_funcao == 'massagista') {
        $comissao_ordem = 10;
    }   
    if($comissao_funcao == 'roupeiro') {
        $comissao_ordem = 11;
    }
    if($comissao_funcao == 'auxiliar_rouparia') {
        $comissao_ordem = 12;
    }	

    update_post_meta($id, 'comissao_funcao', $comissao_funcao);
    update_post_meta($id, 'comissao_ordem', $comissao_ordem);
}

add_action('save_post', 'save_comissao_post');




function comissao_funcao($id) {
    $comissao_funcao = get_post_meta( $id, 'comissao_funcao', true );

    if($comissao_funcao == 'diretor_futebol') {
        $comissao_funcao = 'Diretor de Futebol';
    }
    if($comissao_funcao == 'gerente_futebol') {
        $comissao_funcao = 'Gerente de Futebol';
    }
    if($comissao_funcao == 'supervisor_futebol') {
        $comissao_funcao = 'Supervisor de Futebol';
    }
    if($comissao_funcao == 'tecnico') {
        $comissao_funcao = 'Técnico';
    }
    if($comissao_funcao == 'auxiliar_tecnico') {
        $comissao_funcao = 'Auxiliar Técnico';
    }
    if($comissao_funcao == 'preparador_fisico') {
        $comissao_funcao = 'Preparador Físico';
    }
    if($comissao_funcao == 'treinador_goleiro') {
        $comissao_funcao = 'Treinador de Goleiro';
    }
    if($comissao_funcao == 'fisioterapeuta') {
        $comissao_funcao = 'Fisioterapeuta';
    }
    if($comissao_funcao == 'nutricionista') {
        $comissao_funcao = 'Nutricionista';
    }
    if($comissao_funcao == 'fisiologista') {
        $comissao_funcao = 'Fisiologista';
    }
    if($comissao_funcao == 'analista_desempenho') {
        $comissao_funcao = 'Analista de Desempenho';
    }
    if($comissao_funcao == 'massagista') {
        $comissao_funcao = 'Massagista';
    }
    if($comissao_funcao == 'roupeiro') {
        $comissao_funcao = 'Roupeiro';
    }
    if($comissao_funcao == 'auxiliar_rouparia') {
        $comissao_funcao = 'Auxiliar de Rouparia';
    }

    return $comissao_funcao;

}



//CRIANDO COLUNAS PERSONALIZADAS

add_filter( 'manage_edit-comissao_columns', 'comissao_manage_edit_columns' );
function comissao_manage_edit_columns( $columns ) {
  $comissao_columns = array(
    "cb" => $columns["cb"],
    "title" => 'Nome',
    "comissao_funcao" => 'Função',
  );
  return $comissao_columns;
}
add_action( "manage_posts_custom_column", 'comissao_manage_columns', 10, 2);
function comissao_manage_columns( $column ) {
  global $post;
  switch ($column) {
    case "comissao_funcao":
      // echo get_post_meta( $post->ID, 'comissao_funcao', true );
      echo comissao_funcao($post->ID);
    break;
    case "comissao_ordem":
      echo get_post_meta( $post->ID, 'comissao_ordem', true );
    break;
  }
}

function comissao_types_admin_order( $wp_query ) {
    if (is_admin()) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'comissao') {
            $wp_query->set('meta_key','comissao_ordem');
            $wp_query->set('orderby', 'meta_value_num');
            $wp_query->set('order', 'ASC');
        }
    }
}
add_filter('pre_get_posts', 'comissao_types_admin_order');




