<?php get_header(); ?>

    <main>
        
        <section id="players" class="pd-all">

            <div class="container">

                <?php
                    $row = 'row d-flex justify-content-left align-items-start';
                ?>

                <?php
                    $args = array(
                        'post_type' => 'elenco',
                        'meta_query'=> array(
                            array(
                                'key' => 'elenco_posicao',
                                'value' => array('goleiro', 'zagueiro', 'lateral-direito', 'lateral-esquerdo', 'volante', 'meio-campo', 'atacante'),
                            )
                        ),
                    );                   
                    $query = new WP_Query($args);
                ?>

                <?php if ( $query->have_posts() ) : ?>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('goleiro',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Goleiros</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('zagueiro',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Zagueiros</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('lateral-direito',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Laterais Direitos</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('lateral-esquerdo',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Laterais Esquerdos</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('volante',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Volantes</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>

                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('meio-campo',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                            <div class="col-md-12"><h5 class="position-title">Meias</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>
                    
                    <div class="<?php echo $row; ?>">

                        <?php
                            $args = array(
                                'post_type' => 'elenco',
                                'orderby'   => array( 'title' => 'ASC' ),
                                'meta_query'=> array(
                                    array(
                                        'key' => 'elenco_posicao',
                                        'value' => array('atacante',),
                                    )
                                ),
                            );                   
                            $query = new WP_Query($args);
                        ?>

                        <?php if ( $query->have_posts() ) : ?>

                        <div class="col-md-12"><h5 class="position-title">Atacantes</h5></div>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php get_template_part('partials/elenco'); ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                        
                    </div>


                <?php else : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center pt-5 pb-5"><?php _e( 'Em atualização.' ); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </section>

    </main>

<?php get_footer(); ?>