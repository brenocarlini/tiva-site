<?php
// CUSTOM POST TYPES ELENCO JOGADORES


function post_elenco() {
	$labels = array(
		'name'                => __( 'Jogadores' ),
		'singular_name'       => __( 'Jogador'),
		'menu_name'           => __( 'Elenco'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todos Jogadores'),
		'view_item'           => __( 'Ver Jogador'),
		'add_new_item'        => __( 'Adicionar Jogador'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Jogador'),
		'update_item'         => __( 'Atualizar Jogador'),
		'search_items'        => __( 'Buscar Jogador'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'elenco',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'elenco'),
		'description'         => __( 'Cadastre seu elenco'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'excerpt',),
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
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 9,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'elenco_meta_box', 
        
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
    register_post_type( 'elenco', $args );
}
add_action( 'init', 'post_elenco', 2 );


function elenco_meta_box(){    
    add_meta_box('elenco_info', __('Informações'), 'elenco_meta_info', 'elenco', 'normal', 'high');
}

function elenco_meta_info(){
    global $post;

    echo '<table width="100%">';

    

    echo '<tr>';

    echo '<td colspan="3">';
    $elenco_nome = get_post_meta($post->ID, 'elenco_nome', true);  
    echo '<label for="elenco_nome">Nome Completo: </label> <br /> <br />';
    echo '<input type="text" name="elenco_nome" id="elenco_nome" value="'.  $elenco_nome .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';


    echo '<tr>';

    echo '<td>';
    $elenco_posicao = get_post_meta($post->ID, 'elenco_posicao', true); 
    echo '<label for="elenco_posicao" >Posição: </label> <br />';
    echo '<select name="elenco_posicao" style="width:100%; margin-top:5px;">';
    echo '<option value="goleiro" '. selected( $elenco_posicao, 'goleiro' ).'>Goleiro</option>';
    echo '<option value="zagueiro" '. selected( $elenco_posicao, 'zagueiro' ).'>Zagueiro</option>';
    echo '<option value="lateral-direito" '. selected( $elenco_posicao, 'lateral-direito' ).'>Lateral Direito</option>';
    echo '<option value="lateral-esquerdo" '. selected( $elenco_posicao, 'lateral-esquerdo' ).'>Lateral Esquerdo</option>';
    echo '<option value="volante" '. selected( $elenco_posicao, 'volante' ).'>Volante</option>';
    echo '<option value="meio-campo" '. selected( $elenco_posicao, 'meio-campo' ).'>Meio Campo</option>';
    echo '<option value="atacante" '. selected( $elenco_posicao, 'atacante' ).'>Atacante</option>';
    echo '</select>';
    echo '</td>';

    echo '<td>';
    $elenco_altura = get_post_meta($post->ID, 'elenco_altura', true);  
    echo '<label for="elenco_altura">Altura: </label> <br /> <br />';
    echo '<input type="text" name="elenco_altura" id="elenco_altura" value="'.  $elenco_altura .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '<td>';
    $elenco_peso = get_post_meta($post->ID, 'elenco_peso', true);  
    echo '<label for="elenco_peso">Peso: </label> <br /> <br />';
    echo '<input type="number" name="elenco_peso" id="elenco_peso" value="'.  $elenco_peso .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';

    echo '</tr>';
    
    echo '<tr>';

    echo '<td width="40%">';
    $elenco_data_nascimento = get_post_meta($post->ID, 'elenco_data_nascimento', true);  
    echo '<label for="elenco_data_nascimento">Data de Nascimento: </label> <br /> <br />';
    echo '<input type="date" name="elenco_data_nascimento" id="elenco_data_nascimento" value="'.  $elenco_data_nascimento .'" style="width:100%;" />';
    echo '</td>';

    echo '<td width="40%">';
    $elenco_cidade_nascimento = get_post_meta($post->ID, 'elenco_cidade_nascimento', true); 
    echo '<label for="cidadeNascimento">Cidade de Nascimento: </label> <br /> <br />';
    echo '<input type="text" name="elenco_cidade_nascimento" id="elenco_cidade_nascimento" value="'.  $elenco_cidade_nascimento .'" style="width:100%;" />';
    echo '</td>';

    echo '<td width="20%">';
    $elenco_uf_nascimento = get_post_meta($post->ID, 'elenco_uf_nascimento', true); 
    echo '<label for="elenco_uf_nascimento">UF de Nascimento: </label> <br /> <br />';
    echo '<input type="text" maxlength="2" name="elenco_uf_nascimento" id="elenco_uf_nascimento" value="'.  $elenco_uf_nascimento .'" style="width:100%; text-transform: uppercase;" />';
    echo '</td>';

    echo '</tr>';

    echo '</table>';


}

function elenco_meta_order(){
    global $post;
    $elenco_ordem = get_post_meta($post->ID, 'elenco_ordem', true) ?? "";  
    echo '<input type="number" name="elenco_ordem" id="elenco_ordem" value="'.  $elenco_ordem .'" style="margin-bottom:25px;" readonly />';
}

function save_elenco_post(){
    global $post;
	
	$id = $post->ID ?? "";
	$elenco_nome = $_POST['elenco_nome'] ?? "";
	$elenco_data_nascimento = $_POST['elenco_data_nascimento'] ?? "";
	$elenco_cidade_nascimento = $_POST['elenco_cidade_nascimento'] ?? "";
	$elenco_uf_nascimento = $_POST['elenco_uf_nascimento'] ?? "";
	$elenco_posicao = $_POST['elenco_posicao'] ?? "";
	$elenco_altura = $_POST['elenco_altura'] ?? "";
	$elenco_peso = $_POST['elenco_peso'] ?? "";
    $elenco_ordem = "";

    if($elenco_posicao == 'goleiro') {
        $elenco_ordem = 0;
    }   
    if($elenco_posicao == 'zagueiro') {
        $elenco_ordem = 1;
    }   
    if($elenco_posicao == 'lateral-direito') {
        $elenco_ordem = 2;
    }   
    if($elenco_posicao == 'lateral-esquerdo') {
        $elenco_ordem = 3;
    }   
    if($elenco_posicao == 'volante') {
        $elenco_ordem = 4;
    }  
    if($elenco_posicao == 'meio-campo') {
        $elenco_ordem = 5;
    }   
    if($elenco_posicao == 'atacante') {
        $elenco_ordem = 6;
    } 
	
    update_post_meta($id, 'elenco_nome', $elenco_nome);
    update_post_meta($id, 'elenco_data_nascimento', $elenco_data_nascimento);
    update_post_meta($id, 'elenco_cidade_nascimento', $elenco_cidade_nascimento);
    update_post_meta($id, 'elenco_uf_nascimento', $elenco_uf_nascimento);
    update_post_meta($id, 'elenco_posicao', $elenco_posicao);
    update_post_meta($id, 'elenco_altura', $elenco_altura);
    update_post_meta($id, 'elenco_peso', $elenco_peso);
    update_post_meta($id, 'elenco_ordem', $elenco_ordem);
}

add_action('save_post', 'save_elenco_post');






function elenco_posicao($id) {
    $elenco_posicao = get_post_meta( $id, 'elenco_posicao', true );

    if($elenco_posicao == 'goleiro') {
        $elenco_posicao = 'Goleiro';
    }
    if($elenco_posicao == 'zagueiro') {
        $elenco_posicao = 'Zagueiro';
    }
    if($elenco_posicao == 'lateral-direito') {
        $elenco_posicao = 'Lateral Direito';
    }
    if($elenco_posicao == 'lateral-esquerdo') {
        $elenco_posicao = 'Lateral Esquerdo';
    }
    if($elenco_posicao == 'volante') {
        $elenco_posicao = 'Volante';
    }
    if($elenco_posicao == 'meio-campo') {
        $elenco_posicao = 'Meio Campo';
    }
    if($elenco_posicao == 'atacante') {
        $elenco_posicao = 'Atacante';
    }

    return $elenco_posicao;

}

function localNascimento($id) {
    $elenco_cidade = get_post_meta( $id, 'elenco_cidade_nascimento', true );
    $elenco_uf = get_post_meta( $id, 'elenco_uf_nascimento', true );
    $elenco_local = $elenco_cidade.'/'.strtoupper($elenco_uf);

    return $elenco_local;
}

function dataNascimento($id) {
    $elenco_date = get_post_meta($id, 'elenco_data_nascimento', true); 
    if($elenco_date != '')
    {
        $elenco_date = date("d/m/Y", strtotime($elenco_date));
    }
    return $elenco_date;
}

function calcularIdade($id){
    $elenco_date = get_post_meta($id, 'elenco_data_nascimento', true); 
    $elenco_time = strtotime($elenco_date);
    if($elenco_time === false){
      return '';
    }
    $elenco_year_diff = '';
    $elenco_date = date('Y-m-d', $elenco_time);
    list($elenco_year, $elenco_month, $elenco_day) = explode('-', $elenco_date);
    $elenco_year_diff = date('Y') - $elenco_year;
	if($elenco_month > date('m')) {
		return $elenco_year_diff-1;
	}
    if($elenco_month == date('m')) {
		if($elenco_day <= date('d')) {
			return $elenco_year_diff;
		} else {
			return $elenco_year_diff-1;
		}
	}
    return $elenco_year_diff;
}








//CRIANDO COLUNAS PERSONALIZADAS

add_filter( 'manage_edit-elenco_columns', 'elenco_manage_edit_columns' );
function elenco_manage_edit_columns( $columns ) {
    $elenco_columns = array(

        "cb" => $columns["cb"],
        "title" => 'Nome',
        "elenco_posicao" => 'Posição',
    
    );
    return $elenco_columns;
}
add_action( "manage_posts_custom_column", 'elenco_manage_columns', 10, 2);
function elenco_manage_columns( $column ) {
    global $post;
    switch ($column) {
        case "elenco_posicao":
            echo elenco_posicao($post->ID);
        break;
        case "elenco_ordem":
            echo get_post_meta( $post->ID, 'elenco_ordem', true );
        break;
    }
}

function elenco_types_admin_order( $wp_query ) {
    if (is_admin()) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'elenco') {
            $wp_query->set('meta_key','elenco_ordem');
            $wp_query->set('orderby', 'meta_value_num');
            $wp_query->set('order', 'ASC');
        }
    }
}
add_filter('pre_get_posts', 'elenco_types_admin_order');