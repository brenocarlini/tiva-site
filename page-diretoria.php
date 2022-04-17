<?php get_header(); ?>

    <main>
        
        <section id="coachs" class="pd-all">

            <div class="container">


                <div class="row d-flex justify-content-center align-items-center">

                    <?php
                        $args = array(
                            'post_type'       => 'diretoria',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'ASC' ),
                            'meta_key'        => 'diretoria_ordem',
                            'meta_query'=> array(
                                array(
                                    'key' => 'diretoria_funcao',
                                    'value' => array('dir_presidente', 'dir_vp', 'dir_vp_futebol', 'dir_vp_financas', 'dir_vp_administrativo', 'dir_vp_comercial', 'dir_vp_patrimonio', 'dir_vp_social'),
                                )
                            ),
                        );
                        $the_query = new WP_Query($args);
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            
                            <?php get_template_part('partials/diretoria'); ?>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <div class="col-md-12">
                            <p class="text-center pt-5 pb-5"><?php _e( 'Em atualização!' ); ?></p>
                        </div>
                    <?php endif; ?>


                </div>

                
                <div class="row d-flex justify-content-center align-items-center">


                    <?php
                        $args = array(
                            'post_type'       => 'diretoria',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'ASC' ),
                            'meta_key'        => 'diretoria_ordem',
                            'meta_query'=> array(
                                array(
                                    'key' => 'diretoria_funcao',
                                    'value' => array('vice_presidente', 'vice_futebol', 'vice_financas', 'vice_administrativo', 'vice_comercial', 'vice_patrimonio', 'vice_social'),
                                )
                            ),
                        );
                        $the_query = new WP_Query($args);
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4">

                                <div class="card">
                                    <a>
                                        <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('thumb-player', array('class' => 'card-img-top'));
                                            }
                                            else { 
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/no-professional.png" class="card-img-top">';
                                            } 
                                        ?>
                                        <div class="card-img-overlay">
                                            <div class="card-body d-flex justify-content-end align-items-center flex-column">
                                                    <h5 class="card-name"><?php echo get_the_title(); ?></h5>
                                                    <span class="card-position"><?php echo diretoria_funcao( $post->ID )  ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>

                
                </div>

            </div>

        </section>

    </main>

<?php get_footer(); ?>