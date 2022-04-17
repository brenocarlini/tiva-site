<?php get_header(); ?>

    <main>
        
        <section id="coachs" class="pd-all">

            <div class="container">





                <div class="row d-flex justify-content-center align-items-center">

                    <div class="col-md-12">
                        <h5 class="diretoria-title">Conselho Deliberativo</h5>
                    </div>
                    
                    <?php
                        $args = array(
                            'post_type'       => 'diretoria',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'ASC' ),
                            'meta_key'        => 'diretoria_ordem',
                            'meta_query'=> array(
                                array(
                                    'key' => 'diretoria_funcao',
                                    'value' => array('del_presidente', 'del_vp'),
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

                    <div class="col-md-12">
                        <h5 class="diretoria-title">Conselho Fiscal</h5>
                    </div>

                    <?php
                        $args = array(
                            'post_type'       => 'diretoria',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'ASC' ),
                            'meta_key'        => 'diretoria_ordem',
                            'meta_query'=> array(
                                array(
                                    'key' => 'diretoria_funcao',
                                    'value' => array('fis_presidente'),
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


                
                

            </div>

        </section>

    </main>

<?php get_footer(); ?>