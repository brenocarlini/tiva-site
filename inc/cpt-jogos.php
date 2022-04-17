<?php


function calendario_competicao() {  
    register_taxonomy(  
        'competicao', 'calendario',
        array(  
            'label'                     => 'Competições',
            'show_in_rest'              => true,
            'hierarchical'              => false,
            'public'                    => true,
            'show_ui'                   => true,
            'show_admin_column'         => true,
            'show_in_nav_menus'         => true,
            'show_tagcloud'             => true,
            'query_var'                 => true,
			'rewrite' => array('slug' => 'competicao')
        )  
    );  
}  
add_action( 'init', 'calendario_competicao');


function calendario_clube() {  
    register_taxonomy(  
        'clube', 'calendario',
        array(  
            'label'                     => 'Clubes',
            'show_in_rest'              => true,
            'hierarchical'              => false,
            'public'                    => true,
            'show_ui'                   => true,
            'show_admin_column'         => true,
            'show_in_nav_menus'         => true,
            'show_tagcloud'             => true,
            'query_var'                 => true,
			'rewrite' => array('slug' => 'clube')
        )  
    );  
}  
add_action( 'init', 'calendario_clube');





function post_calendario() {
	$labels = array(
		'name'                => __( 'Partidas' ),
		'singular_name'       => __( 'Partida'),
		'menu_name'           => __( 'Jogos'),
		'parent_item_colon'   => __( 'Parent Deal'),
		'all_items'           => __( 'Todas Partidas'),
		'view_item'           => __( 'Ver Partida'),
		'add_new_item'        => __( 'Adicionar Partida'),
		'add_new'             => __( 'Criar Novo'),
		'edit_item'           => __( 'Editar Partida'),
		'update_item'         => __( 'Atualizar Partida'),
		'search_items'        => __( 'Buscar Partida'),
		'not_found'           => __( 'Não há nenhuma'),
		'not_found_in_trash'  => __( 'Não há nenhuma na lixeira')
    );
    $rewrite = array(
        'slug'                => 'calendario',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
	$args = array(
		'label'               => __( 'calendario'),
		'description'         => __( 'Cadastre Sua Partida'),
		'labels'              => $labels,
		'supports'            => false,
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
        'menu_icon'           => 'dashicons-calendar-alt',
        'menu_position'       => 9,
        'rewrite'             => $rewrite,
        'register_meta_box_cb'=> 'calendario_meta_box',  
    );
    register_post_type( 'calendario', $args );
}
add_action( 'init', 'post_calendario', 2 );



function calendario_meta_box(){        
    add_meta_box('calendario_info', __('Partida'), 'calendario_meta_info', 'calendario', 'normal', 'high');
}



function calendario_meta_info(){
    global $post;

    echo '<table width="100%">';

    echo '<tr>';
    echo '<td colspan="3">';
    $valueTimeCasa = get_post_meta($post->ID, 'time_casa', true); 
    echo '<select name="time_casa">';
    echo '<option value="campeonato-capixaba" '. selected( $valueTimeCasa, 'tecnico' ).'>Técnico</option>';
    echo '<option value="auxiliar_tecnico" '. selected( $valueTimeCasa, 'auxiliar_tecnico' ).'>Auxliar Técnico</option>';
    echo '<option value="preparador_fisico" '. selected( $valueTimeCasa, 'preparador_fisico' ).'>Preparador Físico</option>';
    echo '</select>';
    echo '</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<td colspan="3">';
    $valueNome = get_post_meta($post->ID, 'nome', true);  
    echo '<label for="nomeComplete">Nome Completo: </label> <br /> <br />';
    echo '<input type="text" name="nome" id="nomeCompleto" value="'.  $valueNome .'" style="width:100%; margin-bottom:15px;" />';
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td width="50%">';
    $valueLocal = get_post_meta($post->ID, 'local', true);  
    echo '<label for="local">Local: </label> <br /> <br />';
    echo '<input type="text" name="local" id="local" value="'.  $valueLocal .'" style="width:100%;" />';
    echo '</td>';
    echo '<td width="25%">';
    $valueData = get_post_meta($post->ID, 'data', true); 
    echo '<label for="data">Data: </label> <br /> <br />';
    echo '<input type="date" name="data" id="data" value="'.  $valueData .'" style="width:100%;" />';
    echo '</td>';
    echo '<td width="25%">';
    $valueHora = get_post_meta($post->ID, 'hora', true); 
    echo '<label for="hora">Horário: </label> <br /> <br />';
    echo '<input type="time" name="hora" id="hora" value="'.  $valueHora .'" style="width:100%;" />';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
}



function save_calendario_post(){
    global $post;
	
	$id = $post->ID ?? "";
	$funcao = $_POST['funcao'] ?? "";
	
    update_post_meta($id, 'funcao', $funcao);
}
add_action('save_post', 'save_calendario_post');


