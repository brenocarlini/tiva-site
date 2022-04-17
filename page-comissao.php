<?php get_header(); ?>

    <main>
        
        <section id="coachs" class="pd-all">

            <div class="container">

                <div class="row">

                    <?php
                        $args = array(
                            'post_type'       => 'comissao',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'ASC' ),
                            'meta_key'        => 'comissao_ordem',
                            'meta_query'=> array(
                                array(
                                    'key' => 'comissao_funcao',
                                    'value' => array(
                                        'diretor_futebol', 'gerente_futebol', 'supervisor_futebol', 'tecnico', 
                                        'auxiliar_tecnico', 'preparador_fisico', 'treinador_goleiro', 
                                        'fisioterapeuta', 'nutricionista', 'fisiologista', 'analista_desempenho', 
                                        'massagista', 'roupeiro', 'auxiliar_rouparia'
                                    ),
                                )
                            ),
                        );
                        $the_query = new WP_Query($args);
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-4">

                                <div class="card">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('thumb-player', array('class' => 'card-img-top'));
                                        }
                                        else { 
                                            echo '<img src="'.get_template_directory_uri().'/assets/img/no-professional.png" class="card-img-top">';
                                        } 
                                    ?>
                                        <div class="card-img-overlay">
                                            <div class="card-body">
                                                <h5 class="card-name"><?php echo get_the_title(); ?></h5>
                                                <p class="card-position"><?php echo comissao_funcao( $post->ID )  ?></p>
                                            </div>
                                        </div>
                                </div>

                            </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <div class="col-md-12">
                            <p class="text-center pt-5 pb-5"><?php _e( 'Em atualização.' ); ?></p>
                        </div>
                    <?php endif; ?>

                
                </div>

            </div>

        </section>

    </main>

<?php get_footer(); ?>